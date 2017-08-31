<?php
namespace Kam\Domain\Service\UsersDomainAttr;

use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Brand\BrandInterface;
use Ivoz\Domain\Service\Brand\BrandLifecycleEventHandlerInterface;
use Kam\Domain\Model\UsersDomainAttr\UsersDomainAttrRepository;
use Kam\Domain\Model\UsersDomainAttr\UsersDomainAttr;
use Kam\Domain\Model\UsersDomainAttr\UsersDomainAttrDTO;

/**
 * Class UpdateByBrand
 * @package Kam\Domain\Service\UsersDomainAttr
 * @lifecycle post_persist
 */
class UpdateByBrand implements BrandLifecycleEventHandlerInterface
{
    /**
     * @var DomainRepository
     */
    protected $usersDomainAttrRepository;

    public function __construct(
        EntityPersisterInterface $entityPersister,
        UsersDomainAttrRepository $usersDomainAttrRepository
    ) {
        $this->usersDomainAttrRepository = $usersDomainAttrRepository;
    }

    public function execute(BrandInterface $entity, $isNew)
    {
        $domainName = $entity->getDomainUsers();

        if (!empty($domainName)) {

            $domainsAttr = $this->usersDomainAttrRepository->findBy([
                'did' => $domainName,
                'name' => 'brandId'
            ]);

            if (empty($domainsAttr)) {
                /**
                 * @var UsersDomainAttrDTO $domainAttrDto
                 */
                $domainAttrDto = UsersDomainAttr::createDTO();

                /**
                 * @todo setDid expects CompanyInterface and that's wrong
                 */
                $domainAttrDto
                    ->setDidId($domainName)
                    ->setName('brandId')
                    ->setType('0')
                    ->setValue($entity->getId());

                $this->entityPersister->persist($domainAttrDto);
            }
        }
    }
}