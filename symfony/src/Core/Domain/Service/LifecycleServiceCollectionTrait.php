<?php

namespace Core\Domain\Service;

use Core\Domain\Model\EntityInterface;

trait LifecycleServiceCollectionTrait
{
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

    abstract protected function addService($service);

    public function execute(EntityInterface $entity)
    {
        foreach ($this->services as $service) {
            $service->execute($entity);
        }
    }
}