<?php

namespace Ivoz\Domain\Service\RetailAccount;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class RetailAccountLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(RetailAccountLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}