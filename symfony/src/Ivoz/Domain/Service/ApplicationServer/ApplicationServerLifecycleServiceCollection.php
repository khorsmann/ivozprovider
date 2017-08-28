<?php

namespace Ivoz\Domain\Service\ApplicationServer;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class ApplicationServerLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(ApplicationServerLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}