<?php

namespace Ivoz\Domain\Service\BrandService;

use Ivoz\Domain\Model\BrandService\BrandServiceInterface;

interface BrandServiceLifecycleEventHandlerInterface
{
    public function execute(BrandServiceInterface $entity, $isNew);
}