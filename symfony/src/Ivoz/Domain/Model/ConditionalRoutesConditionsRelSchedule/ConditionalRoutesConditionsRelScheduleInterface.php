<?php

namespace Ivoz\Domain\Model\ConditionalRoutesConditionsRelSchedule;

use Core\Domain\Model\EntityInterface;

interface ConditionalRoutesConditionsRelScheduleInterface extends EntityInterface
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
     * Set schedule
     *
     * @param \Ivoz\Domain\Model\Schedule\ScheduleInterface $schedule
     *
     * @return self
     */
    public function setSchedule(\Ivoz\Domain\Model\Schedule\ScheduleInterface $schedule = null);

    /**
     * Get schedule
     *
     * @return \Ivoz\Domain\Model\Schedule\ScheduleInterface
     */
    public function getSchedule();

}

