<?php
namespace Ivoz\Domain\Service\OutgoingRouting;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface;
use Ivoz\Domain\Model\LcrRule\LcrRule;
use Ivoz\Domain\Model\LcrRule\LcrRuleInterface;
use Ivoz\Domain\Model\LcrRuleTarget\LcrRuleTarget;
use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;
use Ivoz\Domain\Model\PeerServer\PeerServerInterface;
use Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface;
use Ivoz\Domain\Service\PeerServer\PeerServerLifecycleEventHandlerInterface;

/**
 * Class CreateByPeerServer
 * @package Ivoz\Domain\Service\OutgoingRouting
 * @lifecycle post_persist
 */
class CreateByPeerServer implements PeerServerLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    public function __construct(
        EntityPersisterInterface $entityPersister
    ) {
        $this->entityPersister = $this->entityPersister;
    }

    public function execute(PeerServerInterface $entity, $isNew)
    {
        if (!$isNew) {
            return;
        }

        $outgoingRoutings = $entity
            ->getPeeringContract()
            ->getOutgoingRoutings();

        foreach ($outgoingRoutings as $outgoingRouting) {
            $this->updateLCRPerOutgoingRouting($outgoingRouting);
        }
    }

    protected function updateLCRPerOutgoingRouting(OutgoingRoutingInterface $outgoingRouting)
    {
        // If edit, delete everything and fresh-start
        $lcrRules = $outgoingRouting->getLcrRules();
        foreach ($lcrRules as $lcrRule) {
            $this->entityPersister->remove($lcrRule);
        }

        $peeringContract = $outgoingRouting->getPeeringContract();
        if (empty($peeringContract)) {
            throw new \Exception('Peering Contract not found');
        }

        $peerServers = $peeringContract->getPeerServers();

        /**
         * @var LcrGatewayInterface[] $lcrGateways
         */
        $lcrGateways = array();

        /**
         * @var PeerServerInterface $peerServer
         */
        foreach ($peerServers as $peerServer) {
            $lcrGateways = array_merge($lcrGateways, $peerServer->getLcrGateways());
        }

        /**
         * @var LcrRuleInterface[] $lcrRules
         */
        $lcrRules = array();
        // Create LcrRule for each RoutingPattern
        if ($outgoingRouting->getType() === 'group') {
            $patterns = $outgoingRouting->getRoutingPatternGroup()->getRoutingPatterns();
            foreach ($patterns as $pattern) {
                $lcrRule = $this->addLcrRulePerPattern(
                    $outgoingRouting,
                    $pattern
                );
                array_push($lcrRules, $lcrRule);
            }
        } elseif ($outgoingRouting->getType() === 'pattern') {
            $lcrRule = $this->addLcrRulePerPattern(
                $outgoingRouting,
                $outgoingRouting->getRoutingPattern()
            );
            array_push($lcrRules, $lcrRule);
        } elseif ($outgoingRouting->getType() === 'fax') {
            $lcrRule = $this->addLcrRulePerPattern(
                $outgoingRouting
            );
            array_push($lcrRules, $lcrRule);
        } else {
            throw new \Exception('Incorrect Outgoing Routing Type');
        }

        // Create n x m LcrRuleTargets (n LcrRules; m LcrGateways)
        foreach ($lcrRules as $lcrRule) {
            foreach ($lcrGateways as $lcrGateway) {
                $lcrRuleTargetDto = LcrRuleTarget::createDTO();

                $lcrRuleTargetDto
                    ->setRuleId($lcrRule->getId())
                    ->setGwId($lcrGateway->getId())
                    ->setPriority($outgoingRouting->getPriority())
                    ->setWeight($outgoingRouting->getWeight())
                    ->setOutgoingRoutingId($outgoingRouting->getId());

                $this->entityPersister->persist($lcrRuleTargetDto);
            }
        }
    }

    /**
     * @todo this can be a service itself
     * @param OutgoingRoutingInterface $entity
     * @param RoutingPatternInterface|null $pattern
     * @return LcrRuleInterface
     */
    protected function addLcrRulePerPattern(
        OutgoingRoutingInterface $entity,
        RoutingPatternInterface $pattern=null
    ) {
        $lcrRuleDto = LcrRule::createDTO();
        $condition = 'fax';
        if (is_null($pattern)) {
            // Fax route
            $lcrRuleDto
                ->setTag('fax')
                ->setDescription('Special route for fax');
        } else {
            // Non-fax route
            $lcrRuleDto
                ->setTag($pattern->getName())
                ->setDescription($pattern->getDescription())
                ->setRoutingPatternId($pattern->getId());

            $condition = $pattern->getRegExp();
        }

        $lcrRule = LcrRule::fromDTO($lcrRuleDto);
        $lcrRule->setCondition($condition);

        // Setting Outgoing Routing also sets from_uri (see model)
        $lcrRule->setOutgoingRouting($entity);

        /**
         * @todo this makes no sense, we probably should add a method to persist new entities directly
         */
        return $this
            ->entityPersister
            ->persist($lcrRule->toDTO());
    }

}