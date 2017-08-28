<?php

namespace Ivoz\Domain\Service\Domain;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;
use Ivoz\Domain\Service\Domain\DomainLifecycleEventHandlerInterface;

class DomainLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(DomainLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}