<?php

namespace Ivoz\Domain\Service\PeerServer;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class PeerServerLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(QueueLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}