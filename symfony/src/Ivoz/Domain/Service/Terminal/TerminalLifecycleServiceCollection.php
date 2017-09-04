<?php

namespace Ivoz\Domain\Service\Terminal;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class TerminalLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(TerminalLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}