<?php

namespace Ivoz\Domain\Service\RoutingPattern;

use Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface;

interface RoutingPatternLifecycleEventHandlerInterface
{
    public function execute(RoutingPatternInterface $entity, $isNew);
}