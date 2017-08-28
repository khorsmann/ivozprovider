<?php

namespace Ivoz\Domain\Service\DDI;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class DDILifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(DDILifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}