<?php

namespace Core\Model\ExternalCallFilterRelCalendar;

use Assert\Assertion;
use Core\Application\DTO\ExternalCallFilterRelCalendarDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * ExternalCallFilterRelCalendar
 */
class ExternalCallFilterRelCalendar implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Core\Model\ExternalCallFilter\ExternalCallFilter
     */
    protected $filter;

    /**
     * @var \Core\Model\Calendar\Calendar
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

    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return ExternalCallFilterRelCalendarDTO
     */
    public static function createDTO()
    {
        return new ExternalCallFilterRelCalendarDTO();
    }

    /**
     * Factory method
     * @param ExternalCallFilterRelCalendarDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, ExternalCallFilterRelCalendarDTO::class);

        $self = new self();

        return $self
            ->setFilter($dto->getFilter())
            ->setCalendar($dto->getCalendar());
    }

    /**
     * @param ExternalCallFilterRelCalendarDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, ExternalCallFilterRelCalendarDTO::class);

        $this
            ->setFilter($dto->getFilter())
            ->setCalendar($dto->getCalendar());


        return $this;
    }

    /**
     * @return ExternalCallFilterRelCalendarDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setFilterId($this->getFilter() ? $this->getFilter()->getId() : null)
            ->setCalendarId($this->getCalendar() ? $this->getCalendar()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'filterId' => $this->getFilter() ? $this->getFilter()->getId() : null,
            'calendarId' => $this->getCalendar() ? $this->getCalendar()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set filter
     *
     * @param \Core\Model\ExternalCallFilter\ExternalCallFilter $filter
     *
     * @return ExternalCallFilterRelCalendar
     */
    protected function setFilter(\Core\Model\ExternalCallFilter\ExternalCallFilter $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get filter
     *
     * @return \Core\Model\ExternalCallFilter\ExternalCallFilter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Set calendar
     *
     * @param \Core\Model\Calendar\Calendar $calendar
     *
     * @return ExternalCallFilterRelCalendar
     */
    protected function setCalendar(\Core\Model\Calendar\Calendar $calendar)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * Get calendar
     *
     * @return \Core\Model\Calendar\Calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }



    // @codeCoverageIgnoreEnd
}

