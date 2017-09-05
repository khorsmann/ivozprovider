<?php

namespace Ivoz\Domain\Service\ApplicationServer;

use Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface;

interface ApplicationServerLifecycleEventHandlerInterface
{
    public function execute(ApplicationServerInterface $entity, $isNew);
}