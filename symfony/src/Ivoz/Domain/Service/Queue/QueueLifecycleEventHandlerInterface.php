<?php

namespace Ivoz\Domain\Service\Queue;

use Ivoz\Domain\Model\Queue\QueueInterface;

interface QueueLifecycleEventHandlerInterface
{
    public function execute(QueueInterface $entity, $isNew);
}