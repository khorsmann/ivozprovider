<?php

namespace Ivoz\Domain\Service\IvrCommon;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class IvrCommonLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(IvrCommonLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}