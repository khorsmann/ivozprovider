<?php

namespace Ivoz\Domain\Service\Locution;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class LocutionLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(MatchListPatternLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}