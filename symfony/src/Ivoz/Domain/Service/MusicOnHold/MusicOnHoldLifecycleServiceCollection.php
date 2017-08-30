<?php

namespace Ivoz\Domain\Service\MusicOnHold;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class MusicOnHoldLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(MusicOnHoldLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}