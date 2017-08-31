<?php

namespace Ivoz\Domain\Service\OutgoingDDIRule;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class OutgoingDDIRuleLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(OutgoingDDIRuleLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}