<?php

namespace Ivoz\Domain\Service\PeerServer;

use Ivoz\Domain\Model\PeerServer\PeerServerInterface;

interface PeerServerLifecycleEventHandlerInterface
{
    public function execute(PeerServerInterface $entity, $isNew);
}