<?php

namespace Ivoz\Domain\Service\IvrCustomEntry;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class IvrCustomEntryLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(IvrCustomEntryLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}