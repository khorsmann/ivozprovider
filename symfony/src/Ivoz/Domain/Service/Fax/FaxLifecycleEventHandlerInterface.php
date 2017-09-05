<?php

namespace Ivoz\Domain\Service\Fax;

use Ivoz\Domain\Model\Fax\FaxInterface;

interface FaxLifecycleEventHandlerInterface
{
    public function execute(FaxInterface $entity, $isNew);
}