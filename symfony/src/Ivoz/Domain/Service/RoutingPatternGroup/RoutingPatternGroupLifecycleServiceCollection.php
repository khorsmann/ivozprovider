<?php

namespace Ivoz\Domain\Service\RoutingPatternGroup;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class RoutingPatternGroupLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(RoutingPatternLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}