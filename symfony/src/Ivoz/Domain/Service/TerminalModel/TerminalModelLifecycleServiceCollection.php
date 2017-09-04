<?php

namespace Ivoz\Domain\Service\TerminalModel;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class TerminalModelLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(TerminalModelLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}