<?php

namespace Ivoz\Domain\Model\ConditionalRoutesConditionsRelCalendar;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ConditionalRoutesConditionsRelCalendarAbstract
 * @codeCoverageIgnore
 */
abstract class ConditionalRoutesConditionsRelCalendarAbstract
{
    /**
     * @var \Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface
     */
    protected $condition;

    /**
     * @var \Ivoz\Domain\Model\Calendar\CalendarInterface
     */
    protected $calendar;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct()
    {

        $this->initChangelog();
    }

    /**
     * @param string $fieldName
     * @return mixed
     * @throws \Exception
     */
    public function initChangelog()
    {
        $this->_initialValues = $this->__toArray();
    }

    /**
     * @param string $fieldName
     * @return mixed
     * @throws \Exception
     */
    public function hasChanged($fieldName)
    {
        if (array_key_exists($fieldName, $this->_initialValues)) {
            throw new \Exception($fieldName . ' field was not found');
        }
        $getter = 'get' . ucfisrt($fieldName);

        return $this->$getter() != $this->_initialValues[$fieldName];
    }

    public function getInitialValue($fieldName)
    {
        if (array_key_exists($fieldName, $this->_initialValues)) {
            throw new \Exception($fieldName . ' field was not found');
        }

        return $this->_initialValues[$fieldName];
    }

    /**
     * @return ConditionalRoutesConditionsRelCalendarDTO
     */
    public static function createDTO()
    {
        return new ConditionalRoutesConditionsRelCalendarDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConditionalRoutesConditionsRelCalendarDTO
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionsRelCalendarDTO::class);

        $self = new static();

        return $self
            ->setCondition($dto->getCondition())
            ->setCalendar($dto->getCalendar())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConditionalRoutesConditionsRelCalendarDTO
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionsRelCalendarDTO::class);

        $this
            ->setCondition($dto->getCondition())
            ->setCalendar($dto->getCalendar());


        return $this;
    }

    /**
     * @return ConditionalRoutesConditionsRelCalendarDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setConditionId($this->getCondition() ? $this->getCondition()->getId() : null)
            ->setCalendarId($this->getCalendar() ? $this->getCalendar()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'conditionId' => $this->getCondition() ? $this->getCondition()->getId() : null,
            'calendarId' => $this->getCalendar() ? $this->getCalendar()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set condition
     *
     * @param \Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface $condition
     *
     * @return self
     */
    public function setCondition(\Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface $condition)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Get condition
     *
     * @return \Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * Set calendar
     *
     * @param \Ivoz\Domain\Model\Calendar\CalendarInterface $calendar
     *
     * @return self
     */
    public function setCalendar(\Ivoz\Domain\Model\Calendar\CalendarInterface $calendar)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * Get calendar
     *
     * @return \Ivoz\Domain\Model\Calendar\CalendarInterface
     */
    public function getCalendar()
    {
        return $this->calendar;
    }



    // @codeCoverageIgnoreEnd
}

