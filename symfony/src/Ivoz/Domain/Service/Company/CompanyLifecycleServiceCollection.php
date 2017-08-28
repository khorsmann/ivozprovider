<?php

namespace Ivoz\Domain\Service\Company;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class CompanyLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(CompanyLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}