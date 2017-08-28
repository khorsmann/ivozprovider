<?php

namespace Ivoz\Domain\Service\GenericMusicOnHold;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class GenericMusicOnHoldLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(GenericMusicOnHoldLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}