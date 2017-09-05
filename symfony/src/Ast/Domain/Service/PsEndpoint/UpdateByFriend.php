<?php

namespace Ast\Domain\Service\PsEndpoint;

use Ast\Domain\Model\PsEndpoint\PsEndpoint;
use Ast\Domain\Model\PsEndpoint\PsEndpointDTO;
use Ast\Domain\Model\PsEndpoint\PsEndpointRepository;
use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\Friend\Friend;
use Ivoz\Domain\Model\Friend\FriendInterface;
use Ivoz\Domain\Service\Friend\FriendLifecycleEventHandlerInterface;

class UpdateByFriend implements FriendLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * @var PsEndpointRepository
     */
    protected $psEndpointRepository;

    public function __construct(
        EntityPersisterInterface $entityPersister,
        PsEndpointRepository $psEndpointRepository
    ) {
        $this->entityPersister = $entityPersister;
        $this->psEndpointRepository = $psEndpointRepository;
    }

    /**
     * @param Friend $entity
     */
    public function execute(FriendInterface $entity, $isNew)
    {
        // Replicate Terminal into ast_ps_endpoint
        /**
         * @var PsEndpoint $endpoint
         */
        $endpoint = $this->psEndpointRepository->findOneBy([
            "friend" => $entity->getId()
        ]);

        if (is_null($endpoint)) {
            $endPointDto = new PsEndpointDTO();
            $endPointDto
                ->setContext("friends")
                ->setSendDiversion("yes")
                ->setSendPai("yes");
        } else {
            $endPointDto = $endpoint->toDto();
        }

        // Update/Insert endpoint data
        $domainUsers = $entity->getCompany()->getDomainUsers();
        $endPointDto
            ->setFriendId($entity->getId())
            ->setSorceryId($entity->getSorcery())
            ->setFromDomain($domainUsers)
            ->setAors($entity->getSorcery())
            ->setDisallow($entity->getDisallow())
            ->setAllow($entity->getAllow())
            ->setDirectmediaMethod($entity->getDirectmediaMethod())
            ->setTrustIdInbound('yes')
            ->setOutboundProxy('sip:users.ivozprovider.local^3Blr')
            ->setDirectMediaMethod('invite');

        $this->entityPersister->persist($endPointDto, $endpoint);
    }
}