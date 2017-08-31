<?php

namespace Ivoz\Domain\Service\CompanyService;

use Core\Domain\Service\EntityPersisterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\BrandService\BrandService;
use Ivoz\Domain\Model\BrandService\BrandServiceRepository;
use Ivoz\Domain\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\CompanyService\CompanyService;
use Ivoz\Domain\Service\Company\CompanyLifecycleEventHandlerInterface;

/**
 * Class PropagateBrandServices
 * @lifecycle post_persist
 */
class PropagateBrandServices implements CompanyLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * @var BrandServiceRepository
     */
    protected $brandServiceRepository;

    public function __construct(
        EntityPersisterInterface $entityPersister,
        BrandServiceRepository $brandServiceRepository
    ) {
        $this->entityPersister = $entityPersister;
        $this->brandServiceRepository = $brandServiceRepository;
    }

    /**
     * @throws \Exception
     */
    public function execute(CompanyInterface $entity, $isNew)
    {
        if (!$isNew) {
            return;
        }

        $services = $this->brandServiceRepository->findBy([
            'brand' => $entity->getBrand()->getId()
        ]);

        /**
         * @var BrandService $service
         */
        foreach ($services as $service) {
            $companyServiceDto = CompanyService::createDTO();

            $serviceId = $service->getService()->getId();
            $companyServiceDto
                ->setServiceId($serviceId)
                ->setCode($service->getCode())
                ->setCompanyId($entity->getId());

            $this->entityPersister->persist($companyServiceDto);
        }
    }
}