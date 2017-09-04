<?php

namespace Ivoz\Domain\Service\RoutingPattern;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class RoutingPatternLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(RoutingPatternLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}