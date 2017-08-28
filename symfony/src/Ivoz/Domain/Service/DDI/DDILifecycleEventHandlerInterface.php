<?php

namespace Ivoz\Domain\Service\DDI;

use Ivoz\Domain\Model\DDI\DDIInterface;

interface DDILifecycleEventHandlerInterface
{
    public function execute(DDIInterface $entity);
}