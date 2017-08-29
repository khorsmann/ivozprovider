<?php

namespace Ivoz\Domain\Model\ConditionalRoutesConditionsRelCalendar;

use Core\Domain\Model\EntityInterface;

interface ConditionalRoutesConditionsRelCalendarInterface extends EntityInterface
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
     * Set calendar
     *
     * @param \Ivoz\Domain\Model\Calendar\CalendarInterface $calendar
     *
     * @return self
     */
    public function setCalendar(\Ivoz\Domain\Model\Calendar\CalendarInterface $calendar = null);

    /**
     * Get calendar
     *
     * @return \Ivoz\Domain\Model\Calendar\CalendarInterface
     */
    public function getCalendar();

}

