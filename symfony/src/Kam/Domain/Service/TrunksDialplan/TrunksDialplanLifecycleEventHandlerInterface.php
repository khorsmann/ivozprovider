<?php

namespace Kam\Domain\Service\TrunksDialplan;

use Kam\Domain\Model\TrunksDialplan\TrunksDialplanInterface;

interface TrunksDialplanLifecycleEventHandlerInterface
{
    public function execute(TrunksDialplanInterface $entity);
}