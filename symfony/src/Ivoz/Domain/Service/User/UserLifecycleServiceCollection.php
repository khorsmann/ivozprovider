<?php

namespace Ivoz\Domain\Service\User;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class UserLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(UserLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}