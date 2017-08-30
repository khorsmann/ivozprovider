<?php

namespace Ivoz\Domain\Model\OutgoingDDIRulesPattern;

/**
 * OutgoingDDIRulesPattern
 */
class OutgoingDDIRulesPattern extends OutgoingDDIRulesPatternAbstract implements OutgoingDDIRulesPatternInterface
{
    use OutgoingDDIRulesPatternTrait;

    /**
     * Return forced DDI for this rule pattern
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getForcedDDI()
    {
        $ddi = parent::getForcedDDI();
        if ($ddi) {
            return $ddi;
        }

        return $this
            ->getOutgoingDDIRule()
            ->getCompany()
            ->getOutgoingDDI();
    }
}

