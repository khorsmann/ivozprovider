<?php

namespace Ivoz\Domain\Service\OutgoingDDIRulesPattern;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class OutgoingDDIRulesPatternLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(PeerServerLifecycleEventHandlerInterface $service, $isNew)
    {
        $this->services[] = $service;
    }
}