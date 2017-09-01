<?php

namespace Ivoz\Domain\Model\RoutingPatternGroup;

use Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface;

/**
 * RoutingPatternGroup
 */
class RoutingPatternGroup extends RoutingPatternGroupAbstract implements RoutingPatternGroupInterface
{
    use RoutingPatternGroupTrait;

    /**
     * @return \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface[]
     */
    public function getRoutingPatterns()
    {
        $patterns = array();
        $rels = $this->getRelPatterns();

        /**
         * @var RoutingPatternGroupsRelPatternInterface $rel
         */
        foreach ($rels as $rel) {
            array_push($patterns, $rel->getRoutingPattern());
        }

        return $patterns;
    }
}

