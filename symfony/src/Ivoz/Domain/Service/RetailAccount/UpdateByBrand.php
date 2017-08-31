<?php
namespace Ivoz\Domain\Service\RetailAccount;

use Core\Domain\Service\EntityPersisterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Brand\BrandInterface;
use Ivoz\Domain\Model\RetailAccount\RetailAccountDTO;
use Ivoz\Domain\Service\Brand\BrandLifecycleEventHandlerInterface;

class UpdateByBrand implements BrandLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * @var UpdateEntityFromDTO
     */
    protected $entityUpdater;

    public function __construct(
        EntityManagerInterface $em,
        EntityPersisterInterface $entityPersister
    ) {
        $this->entityPersister = $entityPersister;
    }

    public function execute(BrandInterface $entity)
    {
        $retails = $entity->getRetailAccounts();
        foreach ($retails as $retail) {

            /**
             * @var RetailAccountDTO
             */
            $retailDto = $retail->toDto();

            $retailDto->setDomain(
                $entity->getDomainUsers()
            );

            $this->entityPersister->persist($retailDto, $retail);
        }
    }
}