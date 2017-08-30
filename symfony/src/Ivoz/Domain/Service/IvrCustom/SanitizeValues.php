<?php

namespace Ivoz\Domain\Service\IvrCustom;

use Ivoz\Domain\Model\IvrCustom\IvrCustomInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\IvrCustom
 * @lifecycle pre_persist
 */
class SanitizeValues implements LocutionLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(IvrCustomInterface $entity)
    {
        $nullableFields =[
            'number' => 'timeoutNumberValue',
            'extension' => 'timeoutExtensionId',
            'voicemail' => 'timeoutVoiceMailUserId'
        ];

        $routeType = $entity->getTimeoutTargetType();
        foreach ($nullableFields as $type => $fieldName) {
            if ($routeType == $type) {
                continue;
            }
            $setter = 'set' . ucfirst($fieldName);
            $entity->{$setter}(null);
        }

        $nullableErrorFields = [
            'number' => 'errorNumberValue',
            'extension' => 'errorExtensionId',
            'voicemail' => 'errorVoiceMailUserId'
        ];

        $routeErrorType = $entity->getErrorTargetType();
        foreach ($nullableErrorFields as $type => $fieldName) {
            if ($routeErrorType == $type) {
                continue;
            }
            $setter = 'set' . ucfirst($fieldName);
            $entity->{$setter}(null);
        }
    }
}