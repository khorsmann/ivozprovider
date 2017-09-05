<?php

namespace Ivoz\Domain\Service\User;

use Ivoz\Domain\Model\User\UserInterface;

interface UserLifecycleEventHandlerInterface
{
    public function execute(UserInterface $entity, $isNew);
}