<?php

namespace Ivoz\Domain\Service\CompanyAdmin;

use Ivoz\Domain\Model\CompanyAdmin\CompanyAdminInterface;

interface CompanyAdminLifecycleEventHandlerInterface
{
    public function execute(CompanyAdminInterface $entity, $isNew);
}