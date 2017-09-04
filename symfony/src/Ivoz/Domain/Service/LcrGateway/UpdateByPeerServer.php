<?php
namespace Ivoz\Domain\Service\LcrGateway;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\PeerServer\PeerServerInterface;
use Ivoz\Domain\Service\PeerServer\QueueLifecycleEventHandlerInterface;

/**
 * Class UpdateByPeerServer
 * @package Ivoz\Domain\Service\LcrGateway
 * @lifecycle post_persist
 */
class UpdateByPeerServer implements QueueLifecycleEventHandlerInterface
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
        $lcrGateway = $entity->getLcrGateway();
        $lcrGatewayDTO = is_null($lcrGateway)
            ? LcrGateway::createDTO()
            : $lcrGateway->toDTO();

        // Update/Create LcrGateway for this PeerServer
        $lcrGatewayDTO
            ->setGwName($entity->getName())
            ->setIp($entity->getIp())
            ->setHostname($entity->getHostname())
            ->setPort($entity->getPort())
            ->setParams($entity->getParams())
            ->setUriScheme($entity->getUriScheme())
            ->setTransport($entity->getTransport())
            ->setTag($entity->getId())
            ->setFlags($entity->getFlags())
            ->setPeerServerId($entity->getId());

        $this->entityPersister->persist($lcrGatewayDTO, $lcrGateway);
    }
}