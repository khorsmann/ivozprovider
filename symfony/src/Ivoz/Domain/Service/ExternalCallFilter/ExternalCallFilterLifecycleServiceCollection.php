<?php

namespace Ivoz\Domain\Service\ExternalCallFilter;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class ExternalCallFilterLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(ExternalCallFilterLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}