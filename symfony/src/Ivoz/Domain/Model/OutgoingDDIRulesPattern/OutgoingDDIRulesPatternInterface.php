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
     * Set outgoingDDIRuleId
     *
     * @param \Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface $outgoingDDIRuleId
     *
     * @return self
     */
    public function setOutgoingDDIRuleId(\Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface $outgoingDDIRuleId = null);

    /**
     * Get outgoingDDIRuleId
     *
     * @return \Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface
     */
    public function getOutgoingDDIRuleId();

    /**
     * Set matchListId
     *
     * @param \Ivoz\Domain\Model\MatchList\MatchListInterface $matchListId
     *
     * @return self
     */
    public function setMatchListId(\Ivoz\Domain\Model\MatchList\MatchListInterface $matchListId = null);

    /**
     * Get matchListId
     *
     * @return \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchListId();

    /**
     * Set forcedDDIId
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $forcedDDIId
     *
     * @return self
     */
    public function setForcedDDIId(\Ivoz\Domain\Model\DDI\DDIInterface $forcedDDIId = null);

    /**
     * Get forcedDDIId
     *
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getForcedDDIId();

}

