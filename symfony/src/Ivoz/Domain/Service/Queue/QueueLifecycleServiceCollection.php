<?php

namespace Ivoz\Domain\Service\Queue;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class QueueLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(QueueLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}