<?php

namespace Ivoz\Domain\Service\Fax;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class FaxLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(FaxLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}