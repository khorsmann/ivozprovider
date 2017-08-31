<?php

namespace Ivoz\Domain\Model\ConditionalRoutesConditionsRelMatchlist;

use Core\Domain\Model\EntityInterface;

interface ConditionalRoutesConditionsRelMatchlistInterface extends EntityInterface
{
    /**
     * Set condition
     *
     * @param \Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface $condition
     *
     * @return self
     */
    public function setCondition(\Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface $condition = null);

    /**
     * Get condition
     *
     * @return \Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface
     */
    public function getCondition();

    /**
     * Set matchlist
     *
     * @param \Ivoz\Domain\Model\MatchList\MatchListInterface $matchlist
     *
     * @return self
     */
    public function setMatchlist(\Ivoz\Domain\Model\MatchList\MatchListInterface $matchlist = null);

    /**
     * Get matchlist
     *
     * @return \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchlist();

}

