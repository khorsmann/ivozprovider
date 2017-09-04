<?php

namespace Ivoz\Domain\Service\TransformationRulesetGroupsTrunk;

use Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface;

interface TransformationRulesetGroupsTrunkLifecycleEventHandlerInterface
{
    public function execute(TransformationRulesetGroupsTrunkInterface $entity, $isNew);
}