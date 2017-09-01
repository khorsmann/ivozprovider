<?php

namespace Ivoz\Domain\Service\PickUpRelUser;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class PickUpRelUserLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(PickUpRelUserLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}