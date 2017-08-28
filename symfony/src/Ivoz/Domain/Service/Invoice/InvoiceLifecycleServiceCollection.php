<?php

namespace Ivoz\Domain\Service\Invoice;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class InvoiceLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(InvoiceLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}