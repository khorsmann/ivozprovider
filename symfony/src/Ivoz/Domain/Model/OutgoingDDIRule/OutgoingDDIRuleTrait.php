<?php

namespace Ivoz\Domain\Model\OutgoingDDIRule;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * OutgoingDDIRuleTrait
 * @codeCoverageIgnore
 */
trait OutgoingDDIRuleTrait
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $patterns;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());
        $this->patterns = new ArrayCollection();
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->initChangelog();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return OutgoingDDIRuleDTO
     */
    public static function createDTO()
    {
        return new OutgoingDDIRuleDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto OutgoingDDIRuleDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replacePatterns($dto->getPatterns())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto OutgoingDDIRuleDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replacePatterns($dto->getPatterns());


        return $this;
    }

    /**
     * @return OutgoingDDIRuleDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setPatterns($this->getPatterns());
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
     * Add pattern
     *
     * @param \Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface $pattern
     *
     * @return OutgoingDDIRuleTrait
     */
    public function addPattern(\Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface $pattern)
    {
        $this->patterns[] = $pattern;

        return $this;
    }

    /**
     * Remove pattern
     *
     * @param \Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface $pattern
     */
    public function removePattern(\Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface $pattern)
    {
        $this->patterns->removeElement($pattern);
    }

    /**
     * Replace patterns
     *
     * @param \Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface[] $patterns
     * @return self
     */
    public function replacePatterns(array $patterns)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($patterns as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setOutgoingDDIRule($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->patterns as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->patterns[$key] = $updatedEntities[$identity];
            } else {
                $this->removePattern($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addPattern($entity);
        }

        return $this;
    }

    /**
     * Get patterns
     *
     * @return array
     */
    public function getPatterns(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->patterns->matching($criteria)->toArray();
        }

        return $this->patterns->toArray();
    }


}

