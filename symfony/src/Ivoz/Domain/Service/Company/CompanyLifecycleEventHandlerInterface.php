<?php

namespace Ivoz\Domain\Service\Company;

use Ivoz\Domain\Model\Company\CompanyInterface;

interface CompanyLifecycleEventHandlerInterface
{
    public function execute(CompanyInterface $entity, $isNew);
}