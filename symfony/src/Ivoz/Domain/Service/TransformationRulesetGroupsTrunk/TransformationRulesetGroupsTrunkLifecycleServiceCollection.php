<?php

namespace Ivoz\Domain\Service\TransformationRulesetGroupsTrunk;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class TransformationRulesetGroupsTrunkLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(TransformationRulesetGroupsTrunkLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}