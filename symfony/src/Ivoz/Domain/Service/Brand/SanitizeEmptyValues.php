<?php
namespace Ivoz\Domain\Service\Brand;

use Core\Domain\Service\EntityPersisterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Brand\BrandDTO;
use Ivoz\Domain\Model\Brand\BrandInterface;

/**
 * Class SanitizeEmptyValues
 * @package Ivoz\Domain\Service\Brand
 * @lifecycle pre_persist
 */
class SanitizeEmptyValues implements BrandLifecycleEventHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    public function __construct(
        EntityManagerInterface $em,
        EntityPersisterInterface $entityPersister
    ) {
        $this->em = $em;
        $this->entityPersister = $entityPersister;
    }

    /**
     * @param BrandInterface $entity
     */
    public function execute(BrandInterface $entity)
    {
        $alreadyPersisted = $this->em->contains($entity);
        if ($alreadyPersisted) {
            return;
        }

        /**
         * @var $dto BrandDTO
         */
        $dto = $entity->toDTO();
        // Create sane defaults for hidden fields

        /**
         * @todo
         */
//        if (!$model->hasChange('nif')) $model->setNif('12345678-Z');
//        if (!$model->hasChange('postalAddress')) $model->setPostalAddress('Postal address');
//        if (!$model->hasChange('postalCode')) $model->setPostalCode('ZIP');
//        if (!$model->hasChange('town')) $model->setTown('Town');
//        if (!$model->hasChange('country')) $model->setCountry('Country');
//        if (!$model->hasChange('province')) $model->setProvince('Province');

        if (!$dto->getDefaultTimezoneId()) {
            $dto->setDefaultTimezoneId(145);
        }

        if (!$dto->getLanguageId()) {
            $dto->setLanguageId(1);
        }

        $this->entityPersister->persist($dto, $entity);

    }
}