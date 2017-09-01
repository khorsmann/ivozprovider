<?php

namespace Ivoz\Domain\Service\OutgoingRouting;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class OutgoingRoutingLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(OutgoingRoutingLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}