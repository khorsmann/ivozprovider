<?php

namespace Ivoz\Domain\Service\MatchListPattern;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class MatchListPatternLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(MatchListPatternLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}