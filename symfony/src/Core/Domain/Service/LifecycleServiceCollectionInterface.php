<?php

namespace Core\Domain\Service;

use Core\Domain\Model\EntityInterface;

interface LifecycleServiceCollectionInterface
{
    public function setServices(array $services);
    public function execute(EntityInterface $entity);
}