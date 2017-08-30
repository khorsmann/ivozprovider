<?php

namespace Kam\Domain\Service\UsersAddres;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class UsersAddresLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(UsersAddresLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}