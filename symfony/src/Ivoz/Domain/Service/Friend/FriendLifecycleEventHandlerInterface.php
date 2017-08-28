<?php

namespace Ivoz\Domain\Service\Friend;

use Ivoz\Domain\Model\Friend\FriendInterface;

interface FriendLifecycleEventHandlerInterface
{
    public function execute(FriendInterface $entity);
}