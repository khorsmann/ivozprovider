<?php

namespace Ast\Domain\Service\PsEndpoint;

use Ast\Domain\Model\PsEndpoint\PsEndpointRepository;
use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\RetailAccount\RetailAccountInterface;
use Ivoz\Domain\Service\RetailAccount\RoutingPatternGroupLifecycleEventHandlerInterface;
use Ast\Domain\Model\PsEndpoint\PsEndpoint;
use Ast\Domain\Model\PsEndpoint\PsEndpointInterface;

class UpdateByRoutingPatternGroup implements RoutingPatternGroupLifecycleEventHandlerInterface
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
     * @param RetailAccountInterface $entity
     */
    public function execute(RetailAccountInterface $entity, $isNew)
    {
        /**
         * @var PsEndpointInterface $endpoint
         */
        $endpoint = $this->psEndpointRepository->findOneBy([
            'retailAccount' => $entity->getId()
        ]);

        // If not found create a new one
        if (is_null($endpoint)) {

            $endpointDTO = PsEndpoint::createDTO();
            $endpointDTO
                ->setContext('retail')
                ->setSendDiversion('yes')
                ->setSendPai('yes');
        } else {
            $endpointDTO  = $entity->toDTO();
        }

        // Update/Insert endpoint data
        $endpointDTO
            ->setRetailAccountId($entity->getId())
            ->setSorceryId($entity->getSorcery())
            ->setFromDomain($entity->getDomain())
            ->setAors($entity->getSorcery())
            ->setDisallow($entity->getDisallow())
            ->setAllow($entity->getAllow())
            ->setDirectmediaMethod($entity->getDirectmediaMethod())
            ->setTrustIdInbound('yes')
            ->setOutboundProxy('sip:users.ivozprovider.local^3Blr')
            ->setDirectMediaMethod('invite');

        $this->entityPersister->persist($endpointDTO, $endpoint);
    }
}