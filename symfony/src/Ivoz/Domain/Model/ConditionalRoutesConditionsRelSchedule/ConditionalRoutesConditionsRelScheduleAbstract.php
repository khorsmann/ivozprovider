<?php

namespace Ivoz\Domain\Model\ConditionalRoutesConditionsRelSchedule;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ConditionalRoutesConditionsRelScheduleAbstract
 * @codeCoverageIgnore
 */
abstract class ConditionalRoutesConditionsRelScheduleAbstract
{
    /**
     * @var \Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface
     */
    protected $condition;

    /**
     * @var \Ivoz\Domain\Model\Schedule\ScheduleInterface
     */
    protected $schedule;


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
     * @return ConditionalRoutesConditionsRelScheduleDTO
     */
    public static function createDTO()
    {
        return new ConditionalRoutesConditionsRelScheduleDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConditionalRoutesConditionsRelScheduleDTO
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionsRelScheduleDTO::class);

        $self = new static();

        return $self
            ->setCondition($dto->getCondition())
            ->setSchedule($dto->getSchedule())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConditionalRoutesConditionsRelScheduleDTO
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionsRelScheduleDTO::class);

        $this
            ->setCondition($dto->getCondition())
            ->setSchedule($dto->getSchedule());


        return $this;
    }

    /**
     * @return ConditionalRoutesConditionsRelScheduleDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setConditionId($this->getCondition() ? $this->getCondition()->getId() : null)
            ->setScheduleId($this->getSchedule() ? $this->getSchedule()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'conditionId' => $this->getCondition() ? $this->getCondition()->getId() : null,
            'scheduleId' => $this->getSchedule() ? $this->getSchedule()->getId() : null
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
     * Set schedule
     *
     * @param \Ivoz\Domain\Model\Schedule\ScheduleInterface $schedule
     *
     * @return self
     */
    public function setSchedule(\Ivoz\Domain\Model\Schedule\ScheduleInterface $schedule)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get schedule
     *
     * @return \Ivoz\Domain\Model\Schedule\ScheduleInterface
     */
    public function getSchedule()
    {
        return $this->schedule;
    }



    // @codeCoverageIgnoreEnd
}

