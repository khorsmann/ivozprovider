<?php

namespace Ivoz\Domain\Model\ExternalCallFilter;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * ExternalCallFilterTrait
 * @codeCoverageIgnore
 */
trait ExternalCallFilterTrait
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $calendars;

    /**
     * @var ArrayCollection
     */
    protected $blackLists;

    /**
     * @var ArrayCollection
     */
    protected $whiteList;

    /**
     * @var ArrayCollection
     */
    protected $schedules;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());
        $this->calendars = new ArrayCollection();
        $this->blackLists = new ArrayCollection();
        $this->whiteList = new ArrayCollection();
        $this->schedules = new ArrayCollection();
    }

    /**
     * @return ExternalCallFilterDTO
     */
    public static function createDTO()
    {
        return new ExternalCallFilterDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replaceCalendars($dto->getCalendars())
            ->replaceBlackLists($dto->getBlackLists())
            ->replaceWhiteList($dto->getWhiteList())
            ->replaceSchedules($dto->getSchedules())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replaceCalendars($dto->getCalendars())
            ->replaceBlackLists($dto->getBlackLists())
            ->replaceWhiteList($dto->getWhiteList())
            ->replaceSchedules($dto->getSchedules());


        return $this;
    }

    /**
     * @return ExternalCallFilterDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setCalendars($this->getCalendars())
            ->setBlackLists($this->getBlackLists())
            ->setWhiteList($this->getWhiteList())
            ->setSchedules($this->getSchedules());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
            'id' => $this->getId()
        ];
    }


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
     * Add calendar
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelCalendar\ExternalCallFilterRelCalendarInterface $calendar
     *
     * @return ExternalCallFilterTrait
     */
    public function addCalendar(\Ivoz\Domain\Model\ExternalCallFilterRelCalendar\ExternalCallFilterRelCalendarInterface $calendar)
    {
        $this->calendars[] = $calendar;

        return $this;
    }

    /**
     * Remove calendar
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelCalendar\ExternalCallFilterRelCalendarInterface $calendar
     */
    public function removeCalendar(\Ivoz\Domain\Model\ExternalCallFilterRelCalendar\ExternalCallFilterRelCalendarInterface $calendar)
    {
        $this->calendars->removeElement($calendar);
    }

    /**
     * Replace calendars
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelCalendar\ExternalCallFilterRelCalendarInterface[] $calendars
     * @return self
     */
    public function replaceCalendars(array $calendars)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($calendars as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setFilter($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->calendars as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->calendars[$key] = $updatedEntities[$identity];
            } else {
                $this->removeCalendar($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addCalendar($entity);
        }

        return $this;
    }

    /**
     * Get calendars
     *
     * @return array
     */
    public function getCalendars(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->calendars->matching($criteria)->toArray();
        }

        return $this->calendars->toArray();
    }

    /**
     * Add blackList
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterBlackList\ExternalCallFilterBlackListInterface $blackList
     *
     * @return ExternalCallFilterTrait
     */
    public function addBlackList(\Ivoz\Domain\Model\ExternalCallFilterBlackList\ExternalCallFilterBlackListInterface $blackList)
    {
        $this->blackLists[] = $blackList;

        return $this;
    }

    /**
     * Remove blackList
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterBlackList\ExternalCallFilterBlackListInterface $blackList
     */
    public function removeBlackList(\Ivoz\Domain\Model\ExternalCallFilterBlackList\ExternalCallFilterBlackListInterface $blackList)
    {
        $this->blackLists->removeElement($blackList);
    }

    /**
     * Replace blackLists
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterBlackList\ExternalCallFilterBlackListInterface[] $blackLists
     * @return self
     */
    public function replaceBlackLists(array $blackLists)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($blackLists as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setFilter($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->blackLists as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->blackLists[$key] = $updatedEntities[$identity];
            } else {
                $this->removeBlackList($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addBlackList($entity);
        }

        return $this;
    }

    /**
     * Get blackLists
     *
     * @return array
     */
    public function getBlackLists(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->blackLists->matching($criteria)->toArray();
        }

        return $this->blackLists->toArray();
    }

    /**
     * Add whiteList
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterWhiteList\ExternalCallFilterWhiteListInterface $whiteList
     *
     * @return ExternalCallFilterTrait
     */
    public function addWhiteList(\Ivoz\Domain\Model\ExternalCallFilterWhiteList\ExternalCallFilterWhiteListInterface $whiteList)
    {
        $this->whiteList[] = $whiteList;

        return $this;
    }

    /**
     * Remove whiteList
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterWhiteList\ExternalCallFilterWhiteListInterface $whiteList
     */
    public function removeWhiteList(\Ivoz\Domain\Model\ExternalCallFilterWhiteList\ExternalCallFilterWhiteListInterface $whiteList)
    {
        $this->whiteList->removeElement($whiteList);
    }

    /**
     * Replace whiteList
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterWhiteList\ExternalCallFilterWhiteListInterface[] $whiteList
     * @return self
     */
    public function replaceWhiteList(array $whiteList)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($whiteList as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setFilter($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->whiteList as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->whiteList[$key] = $updatedEntities[$identity];
            } else {
                $this->removeWhiteList($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addWhiteList($entity);
        }

        return $this;
    }

    /**
     * Get whiteList
     *
     * @return array
     */
    public function getWhiteList(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->whiteList->matching($criteria)->toArray();
        }

        return $this->whiteList->toArray();
    }

    /**
     * Add schedule
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelSchedule\ExternalCallFilterRelScheduleInterface $schedule
     *
     * @return ExternalCallFilterTrait
     */
    public function addSchedule(\Ivoz\Domain\Model\ExternalCallFilterRelSchedule\ExternalCallFilterRelScheduleInterface $schedule)
    {
        $this->schedules[] = $schedule;

        return $this;
    }

    /**
     * Remove schedule
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelSchedule\ExternalCallFilterRelScheduleInterface $schedule
     */
    public function removeSchedule(\Ivoz\Domain\Model\ExternalCallFilterRelSchedule\ExternalCallFilterRelScheduleInterface $schedule)
    {
        $this->schedules->removeElement($schedule);
    }

    /**
     * Replace schedules
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilterRelSchedule\ExternalCallFilterRelScheduleInterface[] $schedules
     * @return self
     */
    public function replaceSchedules(array $schedules)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($schedules as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setFilter($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->schedules as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->schedules[$key] = $updatedEntities[$identity];
            } else {
                $this->removeSchedule($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addSchedule($entity);
        }

        return $this;
    }

    /**
     * Get schedules
     *
     * @return array
     */
    public function getSchedules(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->schedules->matching($criteria)->toArray();
        }

        return $this->schedules->toArray();
    }


}
