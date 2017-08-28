<?php

namespace Kam\Domain\Service\AccCdr;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class AccCdrLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(AccCdrLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}