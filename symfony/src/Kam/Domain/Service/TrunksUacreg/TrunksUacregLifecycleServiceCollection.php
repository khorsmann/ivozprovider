<?php

namespace Kam\Domain\Service\TrunksUacreg;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class TrunksUacregLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(TrunksUacregLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}