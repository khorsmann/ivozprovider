<?php

namespace Ivoz\Domain\Service\OutgoingDDIRulesPattern;

use Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface;

interface OutgoingDDIRulesPatternLifecycleEventHandlerInterface
{
    public function execute(OutgoingDDIRulesPatternInterface $entity);
}