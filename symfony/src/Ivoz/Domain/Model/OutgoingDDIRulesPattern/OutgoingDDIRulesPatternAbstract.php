<?php

namespace Ivoz\Domain\Model\OutgoingDDIRulesPattern;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * OutgoingDDIRulesPatternAbstract
 * @codeCoverageIgnore
 */
abstract class OutgoingDDIRulesPatternAbstract
{
    /**
     * @comment enum:keep|force
     * @var string
     */
    protected $action;

    /**
     * @var integer
     */
    protected $priority = '1';

    /**
     * @var \Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface
     */
    protected $outgoingDDIRule;

    /**
     * @var \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    protected $matchList;

    /**
     * @var \Ivoz\Domain\Model\DDI\DDIInterface
     */
    protected $forcedDDI;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($action, $priority)
    {
        $this->setAction($action);
        $this->setPriority($priority);
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
     * @return OutgoingDDIRulesPatternDTO
     */
    public static function createDTO()
    {
        return new OutgoingDDIRulesPatternDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto OutgoingDDIRulesPatternDTO
         */
        Assertion::isInstanceOf($dto, OutgoingDDIRulesPatternDTO::class);

        $self = new static(
            $dto->getAction(),
            $dto->getPriority());

        return $self
            ->setOutgoingDDIRule($dto->getOutgoingDDIRule())
            ->setMatchList($dto->getMatchList())
            ->setForcedDDI($dto->getForcedDDI())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto OutgoingDDIRulesPatternDTO
         */
        Assertion::isInstanceOf($dto, OutgoingDDIRulesPatternDTO::class);

        $this
            ->setAction($dto->getAction())
            ->setPriority($dto->getPriority())
            ->setOutgoingDDIRule($dto->getOutgoingDDIRule())
            ->setMatchList($dto->getMatchList())
            ->setForcedDDI($dto->getForcedDDI());


        return $this;
    }

    /**
     * @return OutgoingDDIRulesPatternDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setAction($this->getAction())
            ->setPriority($this->getPriority())
            ->setOutgoingDDIRuleId($this->getOutgoingDDIRule() ? $this->getOutgoingDDIRule()->getId() : null)
            ->setMatchListId($this->getMatchList() ? $this->getMatchList()->getId() : null)
            ->setForcedDDIId($this->getForcedDDI() ? $this->getForcedDDI()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'action' => $this->getAction(),
            'priority' => $this->getPriority(),
            'outgoingDDIRuleId' => $this->getOutgoingDDIRule() ? $this->getOutgoingDDIRule()->getId() : null,
            'matchListId' => $this->getMatchList() ? $this->getMatchList()->getId() : null,
            'forcedDDIId' => $this->getForcedDDI() ? $this->getForcedDDI()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set action
     *
     * @param string $action
     *
     * @return self
     */
    public function setAction($action)
    {
        Assertion::notNull($action);
        Assertion::maxLength($action, 10);
        Assertion::choice($action, array (
          0 => 'keep',
          1 => 'force',
        ));

        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority)
    {
        Assertion::notNull($priority);
        Assertion::integerish($priority);

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set outgoingDDIRule
     *
     * @param \Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface $outgoingDDIRule
     *
     * @return self
     */
    public function setOutgoingDDIRule(\Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface $outgoingDDIRule = null)
    {
        $this->outgoingDDIRule = $outgoingDDIRule;

        return $this;
    }

    /**
     * Get outgoingDDIRule
     *
     * @return \Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface
     */
    public function getOutgoingDDIRule()
    {
        return $this->outgoingDDIRule;
    }

    /**
     * Set matchList
     *
     * @param \Ivoz\Domain\Model\MatchList\MatchListInterface $matchList
     *
     * @return self
     */
    public function setMatchList(\Ivoz\Domain\Model\MatchList\MatchListInterface $matchList = null)
    {
        $this->matchList = $matchList;

        return $this;
    }

    /**
     * Get matchList
     *
     * @return \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchList()
    {
        return $this->matchList;
    }

    /**
     * Set forcedDDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $forcedDDI
     *
     * @return self
     */
    public function setForcedDDI(\Ivoz\Domain\Model\DDI\DDIInterface $forcedDDI = null)
    {
        $this->forcedDDI = $forcedDDI;

        return $this;
    }

    /**
     * Get forcedDDI
     *
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getForcedDDI()
    {
        return $this->forcedDDI;
    }



    // @codeCoverageIgnoreEnd
}

