<?php

namespace Ivoz\Domain\Service\OutgoingDDIRule;

use Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface;

interface OutgoingDDIRuleLifecycleEventHandlerInterface
{
    public function execute(OutgoingDDIRuleInterface $entity);
}