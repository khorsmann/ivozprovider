<?php

namespace Ivoz\Domain\Model\OutgoingDDIRulesPattern;

use Core\Domain\Model\EntityInterface;

interface OutgoingDDIRulesPatternInterface extends EntityInterface
{
    /**
     * Set action
     *
     * @param string $action
     *
     * @return self
     */
    public function setAction($action);

    /**
     * Get action
     *
     * @return string
     */
    public function getAction();

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority);

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority();

    /**
     * Set outgoingDDIRule
     *
     * @param \Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface $outgoingDDIRule
     *
     * @return self
     */
    public function setOutgoingDDIRule(\Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface $outgoingDDIRule = null);

    /**
     * Get outgoingDDIRule
     *
     * @return \Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface
     */
    public function getOutgoingDDIRule();

    /**
     * Set matchList
     *
     * @param \Ivoz\Domain\Model\MatchList\MatchListInterface $matchList
     *
     * @return self
     */
    public function setMatchList(\Ivoz\Domain\Model\MatchList\MatchListInterface $matchList = null);

    /**
     * Get matchList
     *
     * @return \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchList();

    /**
     * Set forcedDDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $forcedDDI
     *
     * @return self
     */
    public function setForcedDDI(\Ivoz\Domain\Model\DDI\DDIInterface $forcedDDI = null);

    /**
     * Get forcedDDI
     *
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getForcedDDI();

}

