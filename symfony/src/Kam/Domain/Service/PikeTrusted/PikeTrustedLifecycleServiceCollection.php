<?php

namespace Kam\Domain\Service\PikeTrusted;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class PikeTrustedLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(PikeTrustedLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}