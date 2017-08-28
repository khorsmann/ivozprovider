<?php

namespace Ast\Domain\Service\PsAor;

use Ast\Domain\Model\PsAor\PsAorDTO;
use Ast\Domain\Model\PsAor\PsAorRepository;
use Ast\Domain\Model\PsEndpoint\PsEndpoint;
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

    /**
     * @var PsAorRepository
     */
    protected $psAorRepository;

    public function __construct(
        EntityPersisterInterface $entityPersister,
        PsEndpointRepository $psEndpointRepository,
        PsAorRepository $psAorRepository
    ) {
        $this->entityPersister = $entityPersister;
        $this->psEndpointRepository = $psEndpointRepository;
        $this->psAorRepository = $psAorRepository;
    }

    public function execute(FriendInterface $entity)
    {
        // Replicate Terminal into ast_ps_endpoint
        /**
         * @var PsEndpoint $endpoint
         */
        $endpoint = $this->psEndpointRepository->findOneBy([
            "friend" => $entity->getId()
        ]);

        if (is_null($endpoint)) {
            // @todo ensure that this is not posible because PsEndpoint should been already persisted
            throw new \Exception('Endpoint not found ');
        }
        $aor = $this->psAorRepository->findOneBy([
            "id" => $endpoint->getId()
        ]);

        if (is_null($aor)) {
            $aorDto = new PsAorDTO();
        } else {
            $aorDto = $aor->toDto();
        }

        $aorDto
            ->setId($endpoint->getId())
            ->setSorceryId($entity->getSorcery())
            ->setContact($entity->getContact())
            ->setMaxContacts(1)
            ->setQualifyFrequency(0)
            ->setRemoveExisting('yes');

        $this->entityPersister->persist($aorDto, $aor);
    }
}