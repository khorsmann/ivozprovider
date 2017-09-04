<?php

namespace Ivoz\Domain\Service\QueueMember;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class QueueMemberLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(QueueMemberLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}