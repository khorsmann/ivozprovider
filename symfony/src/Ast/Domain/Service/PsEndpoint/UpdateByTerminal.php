<?php

namespace Ast\Domain\Service\PsEndpoint;

use Ast\Domain\Model\PsEndpoint\PsEndpointDTO;
use Ast\Domain\Model\PsEndpoint\PsEndpointInterface;
use Ast\Domain\Model\PsEndpoint\PsEndpointRepository;
use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\Friend\Friend;
use Ivoz\Domain\Model\Terminal\TerminalInterface;
use Ivoz\Domain\Service\Terminal\TerminalLifecycleEventHandlerInterface;

class UpdateByTerminal implements TerminalLifecycleEventHandlerInterface
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
    public function execute(TerminalInterface $entity)
    {
        // Replicate Terminal into ast_ps_endpoint
        /**
         * @var PsEndpointInterface $endpoint
         */
        $endpoint = $this->psEndpointRepository->findOneBy([
            'terminalId' => $entity->getId()
        ]);

        if (is_null($endpoint)) {
            $endpointDto = new PsEndpointDTO();
            $endpointDto
                ->setContext('users')
                ->setSendDiversion('yes')
                ->setSendPai('yes');
        } else {
            $endpointDto = $endpoint->toDto();
        }

        // Update/Insert endpoint data
        $endpointDto
            ->setTerminalId($entity->getId())
            ->setSorceryId($entity->getSorcery())
            ->setFromDomain($entity->getCompany()->getDomainUsers())
            ->setAors($entity->getSorcery())
            ->setDisallow($entity->getDisallow())
            ->setAllow($entity->getAllow())
            ->setDirectmediaMethod($entity->getDirectmediaMethod())
            ->setOutboundProxy('sip:users.ivozprovider.local^3Blr');

        $this
            ->entityPersister
            ->persist(
                $endpointDto,
                $endpoint
            );
    }
}