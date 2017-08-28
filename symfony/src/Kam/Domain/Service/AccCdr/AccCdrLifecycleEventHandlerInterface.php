<?php

namespace Kam\Domain\Service\AccCdr;

use Kam\Domain\Model\AccCdr\AccCdrInterface;

interface AccCdrLifecycleEventHandlerInterface
{
    public function execute(AccCdrInterface $entity);
}