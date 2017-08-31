<?php

namespace Kam\Domain\Service\TrunksUacreg;

use Kam\Domain\Model\TrunksUacreg\TrunksUacregInterface;

interface TrunksUacregLifecycleEventHandlerInterface
{
    public function execute(TrunksUacregInterface $entity, $isNew);
}