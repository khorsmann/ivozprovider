<?php

namespace Ivoz\Domain\Service\HuntGroup;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class HuntGroupLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(HuntGroupLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}