<?php

namespace Ivoz\Domain\Service\RoutingPatternGroup;

use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface;

interface RoutingPatternGroupLifecycleEventHandlerInterface
{
    public function execute(RoutingPatternGroupInterface $entity, $isNew);
}