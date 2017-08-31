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
    private $conditionId;

    /**
     * @var mixed
     */
    private $matchlistId;

    /**
     * @var mixed
     */
    private $condition;

    /**
     * @var mixed
     */
    private $matchlist;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'conditionId' => $this->getConditionId(),
            'matchlistId' => $this->getMatchlistId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->condition = $transformer->transform('Ivoz\\Domain\\Model\\ConditionalRoutesCondition\\ConditionalRoutesCondition', $this->getConditionId());
        $this->matchlist = $transformer->transform('Ivoz\\Domain\\Model\\MatchList\\MatchList', $this->getMatchlistId());
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
     * @return \Ivoz\Domain\Model\MatchList\MatchList
     */
    public function getMatchlist()
    {
        return $this->matchlist;
    }
}

