<?php

namespace Ast\Domain\Service\PsAor;

use Ast\Domain\Model\PsAor\PsAorRepository;
use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\Terminal\TerminalInterface;
use Ivoz\Domain\Service\Terminal\TerminalLifecycleEventHandlerInterface;
use Ast\Domain\Model\PsAor\PsAor;
use Ast\Domain\Model\PsAor\PsAorInterface;

class UpdateByTerminal implements TerminalLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * @var PsAorRepository
     */
    protected $psAorRepository;

    public function __construct(
        EntityPersisterInterface $entityPersister,
        PsAorRepository $psAorRepository
    ) {
        $this->entityPersister = $entityPersister;
        $this->psAorRepository = $psAorRepository;
    }

    public function execute(TerminalInterface $entity)
    {
        $endpoint = $entity->getAstPsEndpoint();

        /**
         * Replicate Terminal into ast_ps_aors
         * @var PsAorInterface $aor
         */
        $aor = $this->psAorRepository->find($endpoint->getId());

        // If not found create a new one
        $aorDTO = is_null($aor)
            ? PsAor::createDTO()
            : $aor->toDTO();

        $aorDTO
            ->setId($endpoint->getId())
            ->setSorceryId($entity->getSorcery())
            ->setContact($entity->getContact())
            ->setMaxContacts(1)
            ->setQualifyFrequency(0)
            ->setRemoveExisting('yes');

        $this->entityPersister->persist(
            $aorDTO,
            $aor
        );
    }
}