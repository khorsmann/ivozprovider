<?php

namespace Ivoz\Domain\Service\IvrCustom;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class IvrCustomLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(IvrCustomLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}