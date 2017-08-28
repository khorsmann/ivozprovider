<?php

namespace Ivoz\Domain\Service\CompanyAdmin;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class CompanyAdminLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(CompanyAdminLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}