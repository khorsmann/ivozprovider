<?php

namespace Ivoz\Domain\Model\Schedule;

/**
 * Schedule
 */
class Schedule extends ScheduleAbstract implements ScheduleInterface
{
    use ScheduleTrait;

    public function checkIsOnTimeRange($dayOfTheWeek, \DateTime $time, \DateTimeZone $timeZone)
    {
        if(!call_user_func(array($this, 'get' . $dayOfTheWeek))) {
            return false;
        }

        $time = strtotime(
            $time
                ->setTimezone($timeZone)
                ->format('H:i:s')
        );

        $isInTimeRange =
            ($time > strtotime($this->getTimeIn()))
            && ($time < strtotime($this->getTimeout()));

        return $isInTimeRange;
    }

    public function isOnSchedule(\DateTime $time)
    {
        // Check if Day of The Week is enabled in the schedule
        $dayOfTheWeek = $time->format("l");
        if(!call_user_func(array($this, "get" . $dayOfTheWeek))) {
            return false;
        }

        // Check if time is between begining and end
        $timezone = $time->getTimezone();
        $timeIn = new \DateTime(
            $this->getTimeIn(),
            $timezone
        );
        $timeOut = new \DateTime(
            $this->getTimeOut(),
            $timezone
        );
        $isOnSchedule = ($time >= $timeIn && $time < $timeOut);

        return $isOnSchedule;
    }
}

