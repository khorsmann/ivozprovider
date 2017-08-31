<?php

namespace Ivoz\Domain\Model\ExternalCallFilter;

use Core\Domain\Model\EntityInterface;

interface ExternalCallFilterInterface extends EntityInterface
{
    /**
     * Check if the given number matches External Filter black list
     * @param string $origin in E164 form
     * @return true if number matches, false otherwise
     */
    public function isBlackListed($origin);

    /**
     * Check if the given number matches External Filter white list
     * @param string $origin in E164 form
     * @return true if number matches, false otherwise
     */
    public function isWhitelisted($origin);

    /**
     * @return Null | HolidayDateInterface
     */
    public function getHolidayDateForToday();

    /**
     * @return bool scheduleMatched
     */
    public function isOutOfSchedule();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set holidayTargetType
     *
     * @param string $holidayTargetType
     *
     * @return self
     */
    public function setHolidayTargetType($holidayTargetType = null);

    /**
     * Get holidayTargetType
     *
     * @return string
     */
    public function getHolidayTargetType();

    /**
     * Set holidayNumberValue
     *
     * @param string $holidayNumberValue
     *
     * @return self
     */
    public function setHolidayNumberValue($holidayNumberValue = null);

    /**
     * Get holidayNumberValue
     *
     * @return string
     */
    public function getHolidayNumberValue();

    /**
     * Set outOfScheduleTargetType
     *
     * @param string $outOfScheduleTargetType
     *
     * @return self
     */
    public function setOutOfScheduleTargetType($outOfScheduleTargetType = null);

    /**
     * Get outOfScheduleTargetType
     *
     * @return string
     */
    public function getOutOfScheduleTargetType();

    /**
     * Set outOfScheduleNumberValue
     *
     * @param string $outOfScheduleNumberValue
     *
     * @return self
     */
    public function setOutOfScheduleNumberValue($outOfScheduleNumberValue = null);

    /**
     * Get outOfScheduleNumberValue
     *
     * @return string
     */
    public function getOutOfScheduleNumberValue();

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company);

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();

    /**
     * Set welcomeLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $welcomeLocution
     *
     * @return self
     */
    public function setWelcomeLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $welcomeLocution = null);

    /**
     * Get welcomeLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution();

    /**
     * Set holidayLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $holidayLocution
     *
     * @return self
     */
    public function setHolidayLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $holidayLocution = null);

    /**
     * Get holidayLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getHolidayLocution();

    /**
     * Set outOfScheduleLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $outOfScheduleLocution
     *
     * @return self
     */
    public function setOutOfScheduleLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $outOfScheduleLocution = null);

    /**
     * Get outOfScheduleLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getOutOfScheduleLocution();

    /**
     * Set holidayExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $holidayExtension
     *
     * @return self
     */
    public function setHolidayExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $holidayExtension = null);

    /**
     * Get holidayExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getHolidayExtension();

    /**
     * Set outOfScheduleExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $outOfScheduleExtension
     *
     * @return self
     */
    public function setOutOfScheduleExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $outOfScheduleExtension = null);

    /**
     * Get outOfScheduleExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getOutOfScheduleExtension();

    /**
     * Set holidayVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $holidayVoiceMailUser
     *
     * @return self
     */
    public function setHolidayVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $holidayVoiceMailUser = null);

    /**
     * Get holidayVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getHolidayVoiceMailUser();

    /**
     * Set outOfScheduleVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $outOfScheduleVoiceMailUser
     *
     * @return self
     */
    public function setOutOfScheduleVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $outOfScheduleVoiceMailUser = null);

    /**
     * Get outOfScheduleVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getOutOfScheduleVoiceMailUser();

    /**
     * Add calendar
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelCalendar\ExternalCallFilterRelCalendarInterface $calendar
     *
     * @return ExternalCallFilterTrait
     */
    public function addCalendar(\Ivoz\Domain\Model\ExternalCallFilterRelCalendar\ExternalCallFilterRelCalendarInterface $calendar);

    /**
     * Remove calendar
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelCalendar\ExternalCallFilterRelCalendarInterface $calendar
     */
    public function removeCalendar(\Ivoz\Domain\Model\ExternalCallFilterRelCalendar\ExternalCallFilterRelCalendarInterface $calendar);

    /**
     * Replace calendars
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelCalendar\ExternalCallFilterRelCalendarInterface[] $calendars
     * @return self
     */
    public function replaceCalendars(array $calendars);

    /**
     * Get calendars
     *
     * @return array
     */
    public function getCalendars(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add blackList
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterBlackList\ExternalCallFilterBlackListInterface $blackList
     *
     * @return ExternalCallFilterTrait
     */
    public function addBlackList(\Ivoz\Domain\Model\ExternalCallFilterBlackList\ExternalCallFilterBlackListInterface $blackList);

    /**
     * Remove blackList
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterBlackList\ExternalCallFilterBlackListInterface $blackList
     */
    public function removeBlackList(\Ivoz\Domain\Model\ExternalCallFilterBlackList\ExternalCallFilterBlackListInterface $blackList);

    /**
     * Replace blackLists
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterBlackList\ExternalCallFilterBlackListInterface[] $blackLists
     * @return self
     */
    public function replaceBlackLists(array $blackLists);

    /**
     * Get blackLists
     *
     * @return array
     */
    public function getBlackLists(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add whiteList
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterWhiteList\ExternalCallFilterWhiteListInterface $whiteList
     *
     * @return ExternalCallFilterTrait
     */
    public function addWhiteList(\Ivoz\Domain\Model\ExternalCallFilterWhiteList\ExternalCallFilterWhiteListInterface $whiteList);

    /**
     * Remove whiteList
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterWhiteList\ExternalCallFilterWhiteListInterface $whiteList
     */
    public function removeWhiteList(\Ivoz\Domain\Model\ExternalCallFilterWhiteList\ExternalCallFilterWhiteListInterface $whiteList);

    /**
     * Replace whiteList
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterWhiteList\ExternalCallFilterWhiteListInterface[] $whiteList
     * @return self
     */
    public function replaceWhiteList(array $whiteList);

    /**
     * Get whiteList
     *
     * @return array
     */
    public function getWhiteList(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add schedule
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelSchedule\ExternalCallFilterRelScheduleInterface $schedule
     *
     * @return ExternalCallFilterTrait
     */
    public function addSchedule(\Ivoz\Domain\Model\ExternalCallFilterRelSchedule\ExternalCallFilterRelScheduleInterface $schedule);

    /**
     * Remove schedule
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelSchedule\ExternalCallFilterRelScheduleInterface $schedule
     */
    public function removeSchedule(\Ivoz\Domain\Model\ExternalCallFilterRelSchedule\ExternalCallFilterRelScheduleInterface $schedule);

    /**
     * Replace schedules
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelSchedule\ExternalCallFilterRelScheduleInterface[] $schedules
     * @return self
     */
    public function replaceSchedules(array $schedules);

    /**
     * Get schedules
     *
     * @return array
     */
    public function getSchedules(\Doctrine\Common\Collections\Criteria $criteria = null);

}

