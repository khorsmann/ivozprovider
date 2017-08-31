<?php

namespace Ivoz\Domain\Service\Brand;

use Ivoz\Domain\Model\Brand\BrandInterface;

interface BrandLifecycleEventHandlerInterface
{
    public function execute(BrandInterface $entity, $isNew);
}