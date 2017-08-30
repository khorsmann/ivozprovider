<?php

namespace Ivoz\Domain\Model\OutgoingDDIRule;

use Doctrine\Common\Collections\Criteria;
use Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface;

/**
 * OutgoingDDIRule
 */
class OutgoingDDIRule extends OutgoingDDIRuleAbstract implements OutgoingDDIRuleInterface
{
    use OutgoingDDIRuleTrait;

    /**
     * Return forced DDI for this rule
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getForcedDDI()
    {
        $ddi = parent::getForcedDDI();
        if ($ddi) {
            return $ddi;
        }

        return $this
            ->getCompany()
            ->getOutgoingDDI();
    }

    /**
     * Check final outgoing DDI presentation for given destination
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getOutgoingDDI($originalDDI, $e164destination)
    {
        // Default Rule action
        if ($this->getDefaultAction() == 'keep') {
            $finalDDI = $originalDDI;
        } else if ($this->getDefaultAction() == 'force') {
            $finalDDI = $this->getForcedDDI();
        }

        // Check rule patterns
        $criteria = Criteria::create()->orderBy([
            'priority' => Criteria::ASC
        ]);
        $rulePatterns = $this->getPatterns($criteria);

        /**
         * @var OutgoingDDIRulesPatternInterface $rulePattern
         */
        foreach ($rulePatterns as $rulePattern) {
            $list = $rulePattern->getMatchList();
            // If rule pattern matches, apply action and leave
            if ($list->numberMatches($e164destination)) {
                if ($rulePattern->getAction() == 'force')  {
                    $finalDDI = $rulePattern->getForcedDDI();
                }
                break;
            }
        }

        return $finalDDI;
    }
}

