<?php

namespace Ivoz\Domain\Service\FaxesInOut;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class FaxesInOutLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(FaxesInOutLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}