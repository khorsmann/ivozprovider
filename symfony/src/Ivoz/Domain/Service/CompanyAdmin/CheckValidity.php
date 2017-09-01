<?php

namespace Ivoz\Domain\Service\CompanyAdmin;

use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\CompanyAdmin\CompanyAdminInterface;
use Ivoz\Domain\Model\CompanyAdmin\CompanyAdminRepository;
use Ivoz\Domain\Service\CompanyAdmin\CompanyAdminLifecycleEventHandlerInterface;

/**
 * Class CheckValidity
 * @package Ivoz\Domain\Service\CompanyAdmin
 * @lifecycle pre_persist
 */
class CheckValidity implements CompanyAdminLifecycleEventHandlerInterface
{
    /**
     * @var CompanyAdminRepository
     *
     */
    protected $companyAdminRepository;

    public function __construct(
        CompanyAdminRepository $companyAdminRepository
    ) {
        $this->companyAdminRepository = $companyAdminRepository;
    }

    /**
     * @throws \Exception
     */
    public function execute(CompanyAdminInterface $entity, $isNew)
    {
        if (!$isNew) {
            return;
        }

        $company = $entity->getCompany();
        $user = $this->companyAdminRepository->findOneBy([
            'username' => $entity->getUsername(),
            //@todo This was wrong
            //'brandId' => $entity->getCompany()->getBrandId()
            'company' => $company->getId()
        ]);

        if (!is_null($user)) {
            $error_msg = sprintf (
                "Username '%s' is already used in company '%s'",
                $entity->getUsername(),
                $company->getName()
            );

            throw new \Exception($error_msg);
        }
    }
}