<?php

namespace Ivoz\Domain\Service\PickUpRelUser;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class PickUpRelUserLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(QueueMemberLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}