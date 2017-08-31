<?php

namespace Kam\Domain\Service\UsersDomainAttr;

use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Company\CompanyInterface;
use Ivoz\Domain\Service\Company\CompanyLifecycleEventHandlerInterface;
use Kam\Domain\Model\UsersDomainAttr\UsersDomainAttr;

/**
 * Class UpdateByBrand
 * @package Kam\Domain\Service\UsersDomainAttr
 * @lifecycle post_persist
 */
class CreateByCompany implements CompanyLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    public function __construct(
        EntityPersisterInterface $entityPersister
    ) {
        $this->entityPersister = $entityPersister;
    }

    public function execute(CompanyInterface $entity, $isNew)
    {
        if (!$isNew) {
            // Do nothing if this is not a new entity
            return;
        }

        // Only Create Domain Attributes if company has domain
        if ($entity->getType() !== $entity::$VPBX) {
            return;
        }

        $domainAttrDto = UsersDomainAttr::createDTO();
        $brandId = $entity->getBrand()->getId();
        /**
         * @todo setDid expects CompanyInterface and that's wrong
         */
        $domainAttrDto
            ->setDidId($entity->getDomainUsers())
            ->setName('brandId')
            ->setType('0')
            ->setValue($brandId);

        $this->entityPersister->persist($domainAttrDto);
    }
}