<?php

namespace Kam\Domain\Service\TrunksDialplan;

use Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface;
use Kam\Domain\Model\TrunksDialplan\TrunksDialplanDTO;

trait CreateDialplanRuleDtoTrait
{
    public function createDialplanRuleDtoByTransformationRulesetGroupsTrunk(
        TransformationRulesetGroupsTrunkInterface $entity,
        $matchExp,
        $replaceExp,
        $prio,
        $desc,
        $dpid = null
    ) {
        $trunksDialplanDTO = new TrunksDialplanDTO();
        $dpid = $entity->getCalleeOut();

        $trunksDialplanDTO
            ->setDpid($dpid)
            ->setPr($prio)
            ->setMatchOp(1)
            ->setMatchExp($matchExp)
            ->setMatchLen(0)
            ->setSubstExp($matchExp)
            ->setReplExp($replaceExp)
            ->setAttrs($desc)
            ->setTransformationRulesetGroupsTrunkId($entity->getId());

        return $trunksDialplanDTO;
    }
}