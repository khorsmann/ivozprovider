<?php

namespace Ivoz\Domain\Service\Brand;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class BrandLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(BrandLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}