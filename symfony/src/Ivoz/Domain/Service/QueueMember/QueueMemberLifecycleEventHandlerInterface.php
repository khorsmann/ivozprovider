<?php

namespace Ivoz\Domain\Service\QueueMember;

use Ivoz\Domain\Model\QueueMember\QueueMemberInterface;

interface QueueMemberLifecycleEventHandlerInterface
{
    public function execute(QueueMemberInterface $entity, $isNew);
}