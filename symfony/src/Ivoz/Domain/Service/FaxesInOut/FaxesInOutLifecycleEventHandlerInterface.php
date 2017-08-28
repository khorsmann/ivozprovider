<?php

namespace Ivoz\Domain\Service\FaxesInOut;

use Ivoz\Domain\Model\FaxesInOut\FaxesInOutInterface;

interface FaxesInOutLifecycleEventHandlerInterface
{
    public function execute(FaxesInOutInterface $entity);
}