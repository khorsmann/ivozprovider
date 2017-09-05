<?php

namespace Ivoz\Domain\Service\Terminal;

use Ivoz\Domain\Model\Terminal\TerminalInterface;

interface TerminalLifecycleEventHandlerInterface
{
    public function execute(TerminalInterface $entity, $isNew);
}