<?php
namespace Ivoz\Domain\Service\LcrGateway;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface;
use Ivoz\Domain\Model\LcrRuleTarget\LcrRuleTarget;
use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;
use Ivoz\Domain\Model\PeerServer\PeerServerInterface;

/**
 * Class CreateByOutgoingRouting
 * @package Ivoz\Domain\Service\LcrGateway
 */
class CreateByOutgoingRouting
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

    public function execute(OutgoingRoutingInterface $outgoingRouting)
    {
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

        $lcrRules = $outgoingRouting->getLcrRules();
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
}