<?php

namespace Ivoz\Domain\Service\CallACLPattern;

use Core\Domain\Service\EntityPersisterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Brand\Brand;
use Ivoz\Domain\Model\CallACLPattern\CallACLPattern;
use Ivoz\Domain\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\GenericCallACLPattern\GenericCallACLPattern;
use Ivoz\Domain\Service\Company\CompanyLifecycleEventHandlerInterface;

/**
 * Class PropagateBrandGenericCallACLPatterns
 * @package Ivoz\Domain\Service\CallACLPattern
 * @lifecycle pre_persist
 */
class PropagateBrandGenericCallACLPatterns implements CompanyLifecycleEventHandlerInterface
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
     * @throws \Exception
     */
    public function execute(CompanyInterface $entity)
    {
        $alreadyPersisted = $this->em->contains($entity);
        if ($alreadyPersisted) {
            return;
        }

        $companyDto = $entity->toDTO();
        /**
         * @var Brand $brand
         */
        $brand = $entity->getBrand();
        if (is_null($brand)) {
            throw new \Exception(_("Brand is not set"), 60000);
        }

        /**
         * We can avoid one query here using the repository directly
         */
        $genericCallACLPatterns = $brand->getGenericCallACLPatterns();
        $callACLPatterns = array();

        /**
         * @var GenericCallACLPattern $genericCallACLPattern
         */
        foreach ($genericCallACLPatterns as $genericCallACLPattern) {

            $callACLPatternDto = CallACLPattern::createDTO();
            $callACLPatternDto
                /* @todo ensure that this works as expected, this is not the real company id
                 * because is not persisted yet.
                 */
                ->setCompanyId($companyDto->getId())
                ->setName($genericCallACLPattern->getName())
                ->setRegExp($genericCallACLPattern->getRegExp());

            $callACLPatterns[] = $callACLPatternDto;
        }

        if (!empty($callACLPatterns)) {
            // @todo check whether cascade: ['persist']/ other is necessary
            $companyDto->setCallACLPatterns($callACLPatterns);
            $this->entityPersister->persist($companyDto, $entity);
        }
    }
}