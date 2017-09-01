<?php

namespace Ivoz\Domain\Service\OutgoingRouting;

use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;

interface OutgoingRoutingLifecycleEventHandlerInterface
{
    public function execute(OutgoingRoutingInterface $entity);
}