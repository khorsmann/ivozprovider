<?php

namespace Ivoz\Domain\Service\TerminalModel;

use Ivoz\Domain\Model\TerminalModel\TerminalModelInterface;

interface TerminalModelLifecycleEventHandlerInterface
{
    public function execute(TerminalModelInterface $entity, $isNew);
}