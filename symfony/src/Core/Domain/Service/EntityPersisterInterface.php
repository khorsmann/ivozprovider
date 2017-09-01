<?php

namespace Core\Domain\Service;

use Core\Application\DataTransferObjectInterface;
use Core\Domain\Model\EntityInterface;

interface EntityPersisterInterface
{
    /**
     * @param DataTransferObjectInterface $dto
     * @param EntityInterface|null $entity
     * @return EntityInterface
     */
    public function persist(DataTransferObjectInterface $dto, EntityInterface $entity = null);

    /**
     * @param EntityInterface $entity
     * @return void
     */
    public function remove(EntityInterface $entity);
}