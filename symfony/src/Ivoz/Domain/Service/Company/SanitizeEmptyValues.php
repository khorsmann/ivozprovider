<?php

namespace Ivoz\Domain\Service\Company;

use Core\Domain\Service\EntityPersisterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Company\CompanyDTO;
use Ivoz\Domain\Model\Company\CompanyInterface;

/**
 * Class SanitizeEmptyValues
 * @package Ivoz\Domain\Service\Company
 * @lifecycle pre_persist
 */
class SanitizeEmptyValues implements CompanyLifecycleEventHandlerInterface
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
            return;
        }

        /**
         * @var $dto CompanyDTO
         */
        $dto = $entity->toDTO();

        if (!$dto->getNif()) {
            $dto->setNif('12345678-Z');
        }
        if (!$dto->getPostalAddress()) {
            $dto->setPostalAddress('Postal address');
        }
        if (!$dto->getPostalCode()) {
            $dto->setPostalCode('PC');
        }
        if (!$dto->getTown()) {
            $dto->setTown('Town');
        }
        if (!$dto->getCountryName()) {
            $dto->setCountryName('Country');
        }
        if (!$dto->getProvince()) {
            $dto->setProvince('Province');
        }
        if (!$dto->getDefaultTimezoneId()) {
            $dto->setDefaultTimezoneId(
                // @todo create a shortcut
                $entity->getBrand()->getDefaultTimezone()->getId()
            );
        }
        if (!$dto->getCountryId()) {
            $dto->setCountryId(70);
        }
        if (!$dto->getLanguageId()) {
            $dto->setLanguageId(
                // @todo create a shortcut
                $entity->getBrand()->getLanguage()->getId()
            );
        }
        if (!$dto->getOutboundPrefix()) {
            $dto->setOutboundPrefix('');
        }
        if (!$dto->getMediaRelaySetsId()) {
            $dto->setMediaRelaySetsId(0);
        }
        if (!$dto->getIpFilter()) {
            $dto->setIpFilter(0);
        }
        if (!$dto->getOnDemandRecord()) {
            $dto->setOnDemandRecord(0);
        }
        if (!$dto->getOnDemandRecordCode()) {
            $dto->setOnDemandRecordCode('');
        }
        if (!$dto->getAreaCode()) {
            $dto->setAreaCode('');
        }

        $this->entityPersister->persist($dto, $entity);
    }
}