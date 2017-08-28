<?php

namespace Ivoz\Domain\Service\BrandService;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class BrandServiceLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(BrandServiceLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}