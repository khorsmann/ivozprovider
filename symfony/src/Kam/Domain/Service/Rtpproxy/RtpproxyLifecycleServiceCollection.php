<?php

namespace Kam\Domain\Service\Rtpproxy;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class RtpproxyLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(RtpproxyLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}