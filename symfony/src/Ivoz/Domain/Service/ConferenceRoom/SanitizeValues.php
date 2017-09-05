<?php

namespace Ivoz\Domain\Service\ConferenceRoom;

use Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface;


/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\ConferenceRoom
 * @lifecycle pre_persist
 */
class SanitizeValues implements ConferenceRoomLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(ConferenceRoomInterface $entity, $isNew)
    {
        if (!$entity->getPinProtected()) {
            $entity->setPinCode(null);
        }
    }
}