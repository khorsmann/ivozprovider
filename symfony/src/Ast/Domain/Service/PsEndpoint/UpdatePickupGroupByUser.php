<?php

namespace Ast\Domain\Service\PsEndpoint;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\User\UserInterface;

class UpdatePickupGroupByUser
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    public function __construct(
        EntityPersisterInterface $entityPersister
    ) {
        $this->entityPersister = $entityPersister;
    }

    public function execute(UserInterface $entity)
    {
        $endpoint = $entity->getEndpoint();
        if (!$endpoint) {
            return;
        }

        $endpoint->setPickupGroup(
            /**
             * @todo ensure this method has been implemented
             */
            $entity->getPickUpGroupsIds()
        );

        $this
            ->entityPersister
            ->persist($entity);
    }
}