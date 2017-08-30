<?php

namespace Ivoz\Domain\Service\OutgoingDDIRulesPattern;

use Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\OutgoingDDIRulesPattern
 * @lifecycle pre_persist
 */
class SanitizeValues implements OutgoingDDIRulesPatternLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(OutgoingDDIRulesPatternInterface $entity)
    {
        $nullableFields = [
            'force' => 'forcedDDI',
        ];
        $defaultAction = $entity->getAction();

        foreach ($nullableFields as $type => $fieldName) {
            if ($defaultAction == $type) {
                continue;
            }

            $setter = 'set' . ucfirst($fieldName);
            $entity->{$setter}(null);
        }
    }
}