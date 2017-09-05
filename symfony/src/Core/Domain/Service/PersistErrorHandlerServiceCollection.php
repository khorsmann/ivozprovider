<?php

namespace Core\Domain\Service;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleServiceCollectionTrait;

class PersistErrorHandlerServiceCollection
{
    use LifecycleServiceCollectionTrait;

    /**
     * @var array
     */
    protected $services;

    public function __construct() {
        $this->services = array();
    }

    public function setServices(array $services)
    {
        foreach ($services as $service) {
            $this->addService($service);
        }
    }

    protected function addService(PersistErrorHandlerInterface $service)
    {
        $this->services[] = $service;
    }

    /**
     * @param EntityInterface $entity
     */
    public function execute(\Exception $exception)
    {
        foreach ($this->services as $service) {
            $service->handle($exception);
        }
    }
}