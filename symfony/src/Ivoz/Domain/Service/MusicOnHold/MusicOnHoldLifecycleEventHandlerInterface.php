<?php

namespace Ivoz\Domain\Service\MusicOnHold;

use Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface;

interface MusicOnHoldLifecycleEventHandlerInterface
{
    public function execute(MusicOnHoldInterface $entity);
}