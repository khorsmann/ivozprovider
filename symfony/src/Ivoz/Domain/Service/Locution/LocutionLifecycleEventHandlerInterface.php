<?php

namespace Ivoz\Domain\Service\Locution;

use Ivoz\Domain\Model\Locution\LocutionInterface;

interface LocutionLifecycleEventHandlerInterface
{
    public function execute(LocutionInterface $entity);
}