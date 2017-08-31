<?php

namespace Ivoz\Domain\Model\OutgoingDDIRulesPattern;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class OutgoingDDIRulesPatternDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $action;

    /**
     * @var integer
     */
    private $priority = '1';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $outgoingDDIRuleId;

    /**
     * @var mixed
     */
    private $matchListId;

    /**
     * @var mixed
     */
    private $forcedDDIId;

    /**
     * @var mixed
     */
    private $outgoingDDIRule;

    /**
     * @var mixed
     */
    private $matchList;

    /**
     * @var mixed
     */
    private $forcedDDI;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'action' => $this->getAction(),
            'priority' => $this->getPriority(),
            'id' => $this->getId(),
            'outgoingDDIRuleId' => $this->getOutgoingDDIRuleId(),
            'matchListId' => $this->getMatchListId(),
            'forcedDDIId' => $this->getForcedDDIId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->outgoingDDIRule = $transformer->transform('Ivoz\\Domain\\Model\\OutgoingDDIRule\\OutgoingDDIRule', $this->getOutgoingDDIRuleId());
        $this->matchList = $transformer->transform('Ivoz\\Domain\\Model\\MatchList\\MatchList', $this->getMatchListId());
        $this->forcedDDI = $transformer->transform('Ivoz\\Domain\\Model\\DDI\\DDI', $this->getForcedDDIId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $action
     *
     * @return OutgoingDDIRulesPatternDTO
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param integer $priority
     *
     * @return OutgoingDDIRulesPatternDTO
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param integer $id
     *
     * @return OutgoingDDIRulesPatternDTO
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
     * @param integer $outgoingDDIRuleId
     *
     * @return OutgoingDDIRulesPatternDTO
     */
    public function setOutgoingDDIRuleId($outgoingDDIRuleId)
    {
        $this->outgoingDDIRuleId = $outgoingDDIRuleId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutgoingDDIRuleId()
    {
        return $this->outgoingDDIRuleId;
    }

    /**
     * @return \Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRule
     */
    public function getOutgoingDDIRule()
    {
        return $this->outgoingDDIRule;
    }

    /**
     * @param integer $matchListId
     *
     * @return OutgoingDDIRulesPatternDTO
     */
    public function setMatchListId($matchListId)
    {
        $this->matchListId = $matchListId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMatchListId()
    {
        return $this->matchListId;
    }

    /**
     * @return \Ivoz\Domain\Model\MatchList\MatchList
     */
    public function getMatchList()
    {
        return $this->matchList;
    }

    /**
     * @param integer $forcedDDIId
     *
     * @return OutgoingDDIRulesPatternDTO
     */
    public function setForcedDDIId($forcedDDIId)
    {
        $this->forcedDDIId = $forcedDDIId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getForcedDDIId()
    {
        return $this->forcedDDIId;
    }

    /**
     * @return \Ivoz\Domain\Model\DDI\DDI
     */
    public function getForcedDDI()
    {
        return $this->forcedDDI;
    }
}

