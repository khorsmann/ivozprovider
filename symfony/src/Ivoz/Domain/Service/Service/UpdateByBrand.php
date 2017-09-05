<?php
namespace Ivoz\Domain\Service\Service;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\Brand\BrandInterface;
use Ivoz\Domain\Model\Service\Service;
use Ivoz\Domain\Model\BrandService\BrandService;
use Ivoz\Domain\Model\Service\ServiceRepository;
use Ivoz\Domain\Service\Brand\BrandLifecycleEventHandlerInterface;

class UpdateByBrand implements BrandLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * @var ServiceRepository
     */
    protected $serviceRepository;

    public function __construct(
        EntityPersisterInterface $entityPersister,
        ServiceRepository $serviceRepository
    ) {
        $this->entityPersister = $entityPersister;
        $this->serviceRepository = $serviceRepository;
    }

    public function execute(BrandInterface $entity, $isNew)
    {
        if (!$isNew) {
            return;
        }

        $services = $this->serviceRepository->findAll();

        /**
         * @var Service $service
         */
        foreach ($services as $service) {

            $brandServiceDto = BrandService::createDTO();
            $brandServiceDto
                ->setServiceId($service->getId())
                ->setCode($service->getDefaultCode())
                ->setBrandId($entity->getId());

            $this->entityPersister->persist($brandServiceDto);
        }
    }
}