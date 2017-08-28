<?php

namespace Kam\Domain\Service\Dispatcher;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Service\ApplicationServer\ApplicationServerLifecycleEventHandlerInterface;
use Kam\Domain\Model\Dispatcher\Dispatcher as KamDispatcher;
use Kam\Domain\Model\Dispatcher\DispatcherRepository as KamDispatcherRepository;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface;

/**
 * Class UpdateByApplicationServer
 * @package Kam\Domain\Service\Dispatcher
 * @lifecycle post_persist
 */
class UpdateByApplicationServer implements ApplicationServerLifecycleEventHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * @var KamDispatcherRepository
     */
    protected $dispatcherRepository;

    public function __construct(
        EntityManagerInterface $em,
        EntityPersisterInterface $entityPersister,
        KamDispatcherRepository $dispatcherRepository
    ) {
        $this->em = $em;
        $this->entityPersister = $entityPersister;
        $this->dispatcherRepository = $dispatcherRepository;
    }

    public function execute(ApplicationServerInterface $entity)
    {
        /**
         * Replicate ApplicationServer IP into kam_dispatcher
         * @var KamDispatcher $kamDispatcher
         */
        $kamDispatcher = $this->dispatcherRepository->findOneBy([
            'applicationServer' => $entity->getId()
        ]);

        $isNew = is_null($kamDispatcher);

        $kamDispatcherDto = $isNew
            ? KamDispatcher::createDTO()
            : $kamDispatcher->toDTO();

        $kamDispatcherDto
            ->setApplicationServerId($entity->getId())
            ->setSetid(1)
            ->setDestination('sip:' . $entity->getIp() . ":6060")
            ->setDescription($entity->getName());

        $this->entityPersister->persist($kamDispatcherDto, $kamDispatcher);
    }
}