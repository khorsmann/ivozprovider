<?php

namespace Ivoz\Domain\Service\CallForwardSetting;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class CallForwardSettingLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(CallForwardSettingLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}