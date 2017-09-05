<?php

namespace Ivoz\Domain\Service\IvrCustom;

use Core\Domain\Service\LifecycleEventHandlerInterface;
use Ivoz\Domain\Model\IvrCustom\IvrCustomInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\IvrCustom
 * @lifecycle pre_persist
 */
class SanitizeValues implements IvrCustomLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(IvrCustomInterface $entity, $isNew)
    {
        $nullableFields =[
            'number' => 'timeoutNumberValue',
            'extension' => 'timeoutExtension',
            'voicemail' => 'timeoutVoiceMailUser'
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
            'extension' => 'errorExtension',
            'voicemail' => 'errorVoiceMailUser'
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