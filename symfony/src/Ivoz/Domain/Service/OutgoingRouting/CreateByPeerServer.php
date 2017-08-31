<?php
namespace Ivoz\Domain\Service\OutgoingRouting;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;
use Ivoz\Domain\Model\PeerServer\PeerServerInterface;
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
            $this->_updateLCRPerOutgoingRouting($outgoingRouting);
        }
    }

    protected function _updateLCRPerOutgoingRouting(OutgoingRoutingInterface $outgoingRouting)
    {
        // If edit, delete everything and fresh-start
        $lcrRules = $outgoingRouting->getLcrRules();
        foreach ($lcrRules as $lcrRule) {
            $lcrRule->delete();
        }

        $peeringContract = $outgoingRouting->getPeeringContract();
        if (empty($peeringContract)) {
            throw new \Exception("Peering Contract not found");
        }

        $peerServers = $peeringContract->getPeerServers();
        $lcrGateways = array();
        foreach ($peerServers as $peerServer) {
            $lcrGateways = array_merge($lcrGateways, $peerServer->getLcrGateways());
        }

        $lcrRules = array();
        // Create LcrRule for each RoutingPattern
        if ($outgoingRouting->getType() == 'group') {
            foreach ($outgoingRouting->getRoutingPatternGroup()->getRoutingPatterns() as $pattern) {
                $lcrRule = $this->_addLcrRulePerPattern($outgoingRouting, $pattern);
                array_push($lcrRules, $lcrRule);
            }
        } elseif ($outgoingRouting->getType() == 'pattern') {
            $lcrRule = $this->_addLcrRulePerPattern($outgoingRouting, $outgoingRouting->getRoutingPattern());
            array_push($lcrRules, $lcrRule);
        } elseif ($outgoingRouting->getType() == 'fax') {
            $lcrRule = $this->_addLcrRulePerPattern($outgoingRouting);
            array_push($lcrRules, $lcrRule);
        } else {
            throw new \Exception("Incorrect Outgoing Routing Type");
        }

        // Create n x m LcrRuleTargets (n LcrRules; m LcrGateways)
        foreach ($lcrRules as $lcrRule) {
            foreach ($lcrGateways as $lcrGateway) {
                $lcrRuleTarget = new \IvozProvider\Model\LcrRuleTargets();

                $lcrRuleTarget->setRuleId($lcrRule->getId())
                    ->setGwId($lcrGateway->getId())
                    ->setPriority($outgoingRouting->getPriority())
                    ->setWeight($outgoingRouting->getWeight())
                    ->setOutgoingRoutingId($outgoingRouting->getPrimaryKey())
                    ->save();
            }
        }
    }

}