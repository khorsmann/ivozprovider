<?php

namespace Ivoz\Domain\Service\MatchListPattern;

use Ivoz\Domain\Model\MatchListPattern\MatchListPatternInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\MatchListPattern
 * @lifecycle pre_persist
 */
class SanitizeValues implements MatchListPatternLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(MatchListPatternInterface $entity, $isNew)
    {
        $nullableFields = [
            'number' => 'numberValue',
            'regexp' => 'regExp',
        ];

        $patternType = $entity->getType();
        foreach ($nullableFields as $type => $fieldName) {
            if ($patternType == $type) {
                continue;
            }

            $setter = 'set' . ucfirst($fieldName);
            $entity->{$setter}(null);
        }
    }
}