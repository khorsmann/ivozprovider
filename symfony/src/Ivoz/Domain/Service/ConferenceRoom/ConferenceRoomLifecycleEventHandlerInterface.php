<?php

namespace Ivoz\Domain\Service\ConferenceRoom;

use Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface;

interface ConferenceRoomLifecycleEventHandlerInterface
{
    public function execute(ConferenceRoomInterface $entity, $isNew);
}