<?php

namespace Ivoz\Domain\Model\ConditionalRoutesConditionsRelMatchlist;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ConditionalRoutesConditionsRelMatchlistDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $matchlistId;

    /**
     * @var mixed
     */
    private $conditionId;

    /**
     * @var mixed
     */
    private $matchlist;

    /**
     * @var mixed
     */
    private $condition;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'matchlistId' => $this->getMatchlistId(),
            'conditionId' => $this->getConditionId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->matchlist = $transformer->transform('Ivoz\\Domain\\Model\\Matchlist\\MatchlistInterface', $this->getMatchlistId());
        $this->condition = $transformer->transform('Ivoz\\Domain\\Model\\ConditionalRoutesCondition\\ConditionalRoutesCondition', $this->getConditionId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return ConditionalRoutesConditionsRelMatchlistDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $matchlistId
     *
     * @return ConditionalRoutesConditionsRelMatchlistDTO
     */
    public function setMatchlistId($matchlistId)
    {
        $this->matchlistId = $matchlistId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMatchlistId()
    {
        return $this->matchlistId;
    }

    /**
     * @return \Ivoz\Domain\Model\Matchlist\MatchlistInterface
     */
    public function getMatchlist()
    {
        return $this->matchlist;
    }

    /**
     * @param integer $conditionId
     *
     * @return ConditionalRoutesConditionsRelMatchlistDTO
     */
    public function setConditionId($conditionId)
    {
        $this->conditionId = $conditionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getConditionId()
    {
        return $this->conditionId;
    }

    /**
     * @return \Ivoz\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesCondition
     */
    public function getCondition()
    {
        return $this->condition;
    }
}

