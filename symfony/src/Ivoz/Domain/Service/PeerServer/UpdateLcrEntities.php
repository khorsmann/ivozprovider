<?php
namespace Ivoz\Domain\Service\PeerServer;

use Ivoz\Domain\Model\PeerServer\PeerServerInterface;
use Ivoz\Domain\Service\LcrGateway\CreateByOutgoingRouting;
use \Ivoz\Domain\Service\OutgoingRouting\UpdateLcrEntities as OutgoingRoutingUpdateLcrEntities;

/**
 * Class UpdateLcrEntities
 * @package Ivoz\Domain\Service\PeerServer
 * @lifecycle post_persist
 */
class UpdateLcrEntities implements QueueLifecycleEventHandlerInterface
{
    /**
     * @var UpdateLcrEntities
     */
    protected $updateLcrEntitiesByOutgoingRouting;

    /**
     * @var CreateByOutgoingRouting
     */
    protected $createLcrGatewayByOutgoingRouting;

    public function __construct(
        OutgoingRoutingUpdateLcrEntities $updateLcrEntitiesByOutgoingRouting
    ) {
        $this->updateLcrEntitiesByOutgoingRouting = $updateLcrEntitiesByOutgoingRouting;
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
            $this->updateLcrEntitiesByOutgoingRouting->execute($outgoingRouting);
        }
    }
}