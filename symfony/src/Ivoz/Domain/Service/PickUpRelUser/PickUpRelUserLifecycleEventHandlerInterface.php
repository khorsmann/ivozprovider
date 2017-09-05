<?php

namespace Ivoz\Domain\Service\PickUpRelUser;

use Ivoz\Domain\Model\PickUpRelUser\PickUpRelUserInterface;

interface PickUpRelUserLifecycleEventHandlerInterface
{
    public function execute(PickUpRelUserInterface $entity, $isNew);
}