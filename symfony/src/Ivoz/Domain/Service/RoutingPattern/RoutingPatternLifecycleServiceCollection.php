<?php

namespace Ivoz\Domain\Service\RoutingPattern;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class RoutingPatternLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(TerminalModelLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}