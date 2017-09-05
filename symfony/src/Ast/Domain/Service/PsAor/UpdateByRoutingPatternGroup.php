<?php

namespace Ast\Domain\Service\PsAor;

use Ast\Domain\Model\PsAor\PsAorRepository;
use Ast\Domain\Model\PsEndpoint\PsEndpointInterface;
use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\RetailAccount\RetailAccountInterface;
use Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface;
use Ivoz\Domain\Service\RetailAccount\RoutingPatternGroupLifecycleEventHandlerInterface;
use Ast\Domain\Model\PsAor\PsAor;
use Ast\Domain\Model\PsAor\PsAorInterface;
use Ivoz\Domain\Service\RoutingPattern\RoutingPatternLifecycleEventHandlerInterface;

class UpdateByRoutingPatternGroup implements RoutingPatternLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * @var PsAorRepository
     */
    protected $psAorRepository;

    /**
     * @varPsEndpointRepository
     */
    protected $psEndpointRepository;

    public function __construct(
        EntityPersisterInterface $entityPersister,
        PsAorRepository $psAorRepository,
        PsEndpointRepository $psEndpointRepository
    ) {
        $this->entityPersister = $entityPersister;
        $this->psAorRepository = $psAorRepository;
        $this->psEndpointRepository = $psEndpointRepository;
    }

    /**
     * @param RetailAccountInterface $entity
     */
    public function execute(RoutingPatternInterface $entity, $isNew)
    {
        /**
         * @var PsAorInterface $aor
         */
        $aor = $this->psAorRepository->findOneBy([
            'id' => $entity->getId()
        ]);

        $aorDTO = is_null($aor)
            ? PsAor::createDTO()
            : $aor->toDTO();

        /**
         * @var PsEndpointInterface $endpoint
         */
        $endpoint = $this->psEndpointRepository->findOneBy([
            'retailAccount' => $entity->getId()
        ]);

        $aorDTO
            ->setId($endpoint->getId())
            ->setSorceryId($entity->getSorcery())
            ->setContact($entity->getContact())
            ->setMaxContacts(1)
            ->setQualifyFrequency(0)
            ->setRemoveExisting('yes');

        $this->entityPersister->persist($aorDTO, $aor);
    }
}