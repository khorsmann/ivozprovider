<?php

namespace Ivoz\Domain\Service\Friend;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class FriendLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(FriendLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}