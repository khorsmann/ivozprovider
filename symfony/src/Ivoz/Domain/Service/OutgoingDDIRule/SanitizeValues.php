<?php

namespace Ivoz\Domain\Service\OutgoingDDIRule;

use Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\OutgoingDDIRule
 * @lifecycle pre_persist
 */
class SanitizeValues implements OutgoingDDIRuleLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(OutgoingDDIRuleInterface $entity)
    {
        $nullableFields = [
            'force' => 'forcedDDIId',
        ];
        $defaultAction = $entity->getDefaultAction();

        foreach ($nullableFields as $type => $fieldName) {
            if ($defaultAction == $type) {
                continue;
            }

            $setter = 'set' . ucfirst($fieldName);
            $entity->{$setter}(null);
        }
    }
}