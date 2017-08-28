<?php

namespace Kam\Domain\Service\TrunksDialplan;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class TrunksDialplanLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(TrunksDialplanLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}