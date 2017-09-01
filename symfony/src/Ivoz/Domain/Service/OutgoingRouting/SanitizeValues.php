<?php

namespace Ivoz\Domain\Service\OutgoingRouting;

use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\OutgoingRouting
 * @lifecycle pre_persist
 */
class SanitizeValues implements OutgoingRoutingLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(OutgoingRoutingInterface $entity)
    {
        if ($entity->getType() == 'group') {
            $entity->setRoutingPattern(null);
        } elseif ($entity->getType() == 'pattern') {
            $entity->setRoutingPatternGroup(null);
        } elseif ($entity->getType() == 'fax') {
            $entity->setRoutingPattern(null);
            $entity->setRoutingPatternGroup(null);
        } else {
            throw new \Exception('Incorrect Outgoing Routing Type');
        }

    }
}