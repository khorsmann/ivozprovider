<?php

namespace Ivoz\Domain\Service\InvoiceTemplate;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class InvoiceTemplateLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(InvoiceTemplateLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}