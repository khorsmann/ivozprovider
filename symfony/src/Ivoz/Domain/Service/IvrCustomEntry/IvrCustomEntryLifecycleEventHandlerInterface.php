<?php

namespace Ivoz\Domain\Service\IvrCustomEntry;

use Ivoz\Domain\Model\IvrCustomEntry\IvrCustomEntryInterface;

interface IvrCustomEntryLifecycleEventHandlerInterface
{
    public function execute(IvrCustomEntryInterface $entity, $isNew);
}