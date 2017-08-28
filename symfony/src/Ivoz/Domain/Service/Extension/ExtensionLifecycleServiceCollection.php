<?php

namespace Ivoz\Domain\Service\Extension;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class ExtensionLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(ExtensionLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}