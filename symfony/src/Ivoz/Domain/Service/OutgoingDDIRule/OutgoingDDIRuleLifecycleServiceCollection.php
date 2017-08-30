<?php

namespace Ivoz\Domain\Service\OutgoingDDIRule;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class OutgoingDDIRuleLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(OutgoingDDIRulesPatternLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}