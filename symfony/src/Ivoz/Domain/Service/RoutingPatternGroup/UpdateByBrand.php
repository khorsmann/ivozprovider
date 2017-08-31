<?php
namespace Ivoz\Domain\Service\RoutingPatternGroup;

use Core\Domain\Service\EntityPersisterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Brand\BrandInterface;
use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupDTO;
use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroup;
use Ivoz\Domain\Model\Country\Country;
use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupRepository;
use Ivoz\Domain\Model\Country\CountryRepository;
use Ivoz\Domain\Model\RoutingPattern\RoutingPatternDTO;
use Ivoz\Domain\Model\RoutingPattern\RoutingPattern;
use Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPattern;
use Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternDTO;
use Ivoz\Domain\Service\Brand\BrandLifecycleEventHandlerInterface;

/**
 * Class UpdateByBrand
 * @package Ivoz\Domain\Service\RoutingPatternGroup
 * @lifecycle post_persist
 */
class UpdateByBrand implements BrandLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * @var RoutingPatternGroupRepository
     */
    protected $routingPatternGroupRepository;

    /**
     * @var CountryRepository
     */
    protected $countryRepository;

    public function __construct(
        EntityPersisterInterface $entityPersister,
        RoutingPatternGroupRepository $routingPatternGroupRepository,
        CountryRepository $countryRepository
    ) {
        $this->entityPersister = $entityPersister;
        $this->routingPatternGroupRepository = $routingPatternGroupRepository;
        $this->countryRepository = $countryRepository;
    }

    public function execute(BrandInterface $entity, $isNew)
    {
        if (!$isNew) {
            return;
        }

        $countries = $this->countryRepository->findAll();

        /**
         * @var Country $country
         */
        foreach ($countries as $country) {

            /**
             * @var RoutingPatternDTO $routingPattern
             */
            $routingPatternDto = RoutingPattern::createDTO();
            $routingPatternDto
                ->setNameEs($country->getNameEs())
                ->setNameEn($country->getNameEn())
                ->setDescriptionEs('')
                ->setDescriptionEn('')
                ->setRegExp($country->getCallingCode())
                ->setBrandId($entity->getId());

            $this->entityPersister->persist($routingPatternDto);

            if (!$country->getZone()) {
                continue;
            }

            $routingPatternGroup = $this->routingPatternGroupRepository->findOneBy([
                'brandId' => $entity->getId(),
                'name' => $country->getZone()
            ]);

            if (empty($routingPatternGroups)) {

                /**
                 * @var RoutingPatternGroupDto $routingPatternGroupDto
                 */
                $routingPatternGroupDto = RoutingPatternGroup::createDTO();
                $routingPatternGroupDto
                    ->setName($country->getZone())
                    ->setBrandId($entity->getId());

                $routingPatternGroup = $this->entityPersister->persist($routingPatternGroupDto);
            }

            /**
             * @var RoutingPatternGroupsRelPatternDTO $routingPatternGroupsRelPatternDto
             */
            $routingPatternGroupsRelPatternDto = RoutingPatternGroupsRelPattern::createDTO();
            $routingPatternGroupsRelPatternDto
                ->setRoutingPatternId($routingPattern->getId())
                ->setRoutingPatternGroupid($routingPatternGroup->getId());

            $this->entityPersister->persist($routingPatternGroupsRelPatternDto);
        }
    }
}