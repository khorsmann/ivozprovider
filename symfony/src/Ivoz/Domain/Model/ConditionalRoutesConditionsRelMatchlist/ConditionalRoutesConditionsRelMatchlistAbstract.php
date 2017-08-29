<?php

namespace Ivoz\Domain\Model\ConditionalRoutesConditionsRelMatchlist;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ConditionalRoutesConditionsRelMatchlistAbstract
 * @codeCoverageIgnore
 */
abstract class ConditionalRoutesConditionsRelMatchlistAbstract
{
    /**
     * @var \Ivoz\Domain\Model\Matchlist\MatchlistInterface
     */
    protected $matchlist;

    /**
     * @var \Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface
     */
    protected $condition;


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
     * @return ConditionalRoutesConditionsRelMatchlistDTO
     */
    public static function createDTO()
    {
        return new ConditionalRoutesConditionsRelMatchlistDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConditionalRoutesConditionsRelMatchlistDTO
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionsRelMatchlistDTO::class);

        $self = new static();

        return $self
            ->setMatchlist($dto->getMatchlist())
            ->setCondition($dto->getCondition())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConditionalRoutesConditionsRelMatchlistDTO
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionsRelMatchlistDTO::class);

        $this
            ->setMatchlist($dto->getMatchlist())
            ->setCondition($dto->getCondition());


        return $this;
    }

    /**
     * @return ConditionalRoutesConditionsRelMatchlistDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setMatchlistId($this->getMatchlist() ? $this->getMatchlist()->getId() : null)
            ->setConditionId($this->getCondition() ? $this->getCondition()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'matchlistId' => $this->getMatchlist() ? $this->getMatchlist()->getId() : null,
            'conditionId' => $this->getCondition() ? $this->getCondition()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set matchlist
     *
     * @param \Ivoz\Domain\Model\Matchlist\MatchlistInterface $matchlist
     *
     * @return self
     */
    public function setMatchlist(\Ivoz\Domain\Model\Matchlist\MatchlistInterface $matchlist = null)
    {
        $this->matchlist = $matchlist;

        return $this;
    }

    /**
     * Get matchlist
     *
     * @return \Ivoz\Domain\Model\Matchlist\MatchlistInterface
     */
    public function getMatchlist()
    {
        return $this->matchlist;
    }

    /**
     * Set condition
     *
     * @param \Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface $condition
     *
     * @return self
     */
    public function setCondition(\Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface $condition = null)
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



    // @codeCoverageIgnoreEnd
}

