<?php

namespace Ivoz\Domain\Service\GenericMusicOnHold;

use Ivoz\Domain\Model\GenericMusicOnHold\GenericMusicOnHoldInterface;

interface GenericMusicOnHoldLifecycleEventHandlerInterface
{
    public function execute(GenericMusicOnHoldInterface $entity);
}