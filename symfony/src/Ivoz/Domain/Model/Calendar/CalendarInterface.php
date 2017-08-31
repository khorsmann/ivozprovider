<?php

namespace Ivoz\Domain\Model\Calendar;

use Core\Domain\Model\EntityInterface;

interface CalendarInterface extends EntityInterface
{
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
     * Add holidayDate
     *
     * @param \Ivoz\Domain\Model\HolidayDate\HolidayDateInterface $holidayDate
     *
     * @return CalendarTrait
     */
    public function addHolidayDate(\Ivoz\Domain\Model\HolidayDate\HolidayDateInterface $holidayDate);

    /**
     * Remove holidayDate
     *
     * @param \Ivoz\Domain\Model\HolidayDate\HolidayDateInterface $holidayDate
     */
    public function removeHolidayDate(\Ivoz\Domain\Model\HolidayDate\HolidayDateInterface $holidayDate);

    /**
     * Replace holidayDates
     *
     * @param \Ivoz\Domain\Model\HolidayDate\HolidayDateInterface[] $holidayDates
     * @return self
     */
    public function replaceHolidayDates(array $holidayDates);

    /**
     * Get holidayDates
     *
     * @return array
     */
    public function getHolidayDates(\Doctrine\Common\Collections\Criteria $criteria = null);

}

