<?php

namespace Kam\Domain\Service\PikeTrusted;

use Kam\Domain\Model\PikeTrusted\PikeTrustedInterface;

interface PikeTrustedLifecycleEventHandlerInterface
{
    public function execute(PikeTrustedInterface $entity);
}