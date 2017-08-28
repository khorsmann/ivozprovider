<?php

namespace Ivoz\Domain\Service\ConferenceRoom;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class ConferenceRoomLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(ConferenceRoomLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}