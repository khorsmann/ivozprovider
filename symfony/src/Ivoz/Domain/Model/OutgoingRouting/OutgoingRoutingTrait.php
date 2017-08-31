<?php

namespace Ivoz\Domain\Model\OutgoingRouting;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * OutgoingRoutingTrait
 * @codeCoverageIgnore
 */
trait OutgoingRoutingTrait
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $lcrRules;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());
        $this->lcrRules = new ArrayCollection();
    }

    /**
     * @return OutgoingRoutingDTO
     */
    public static function createDTO()
    {
        return new OutgoingRoutingDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto OutgoingRoutingDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replaceLcrRules($dto->getLcrRules())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto OutgoingRoutingDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replaceLcrRules($dto->getLcrRules());


        return $this;
    }

    /**
     * @return OutgoingRoutingDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setLcrRules($this->getLcrRules());
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
     * Add lcrRule
     *
     * @param \Ivoz\Domain\Model\LcrRule\LcrRuleInterface $lcrRule
     *
     * @return OutgoingRoutingTrait
     */
    public function addLcrRule(\Ivoz\Domain\Model\LcrRule\LcrRuleInterface $lcrRule)
    {
        $this->lcrRules[] = $lcrRule;

        return $this;
    }

    /**
     * Remove lcrRule
     *
     * @param \Ivoz\Domain\Model\LcrRule\LcrRuleInterface $lcrRule
     */
    public function removeLcrRule(\Ivoz\Domain\Model\LcrRule\LcrRuleInterface $lcrRule)
    {
        $this->lcrRules->removeElement($lcrRule);
    }

    /**
     * Replace lcrRules
     *
     * @param \Ivoz\Domain\Model\LcrRule\LcrRuleInterface[] $lcrRules
     * @return self
     */
    public function replaceLcrRules(array $lcrRules)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($lcrRules as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setOutgoingRouting($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->lcrRules as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->lcrRules[$key] = $updatedEntities[$identity];
            } else {
                $this->removeLcrRule($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addLcrRule($entity);
        }

        return $this;
    }

    /**
     * Get lcrRules
     *
     * @return array
     */
    public function getLcrRules(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->lcrRules->matching($criteria)->toArray();
        }

        return $this->lcrRules->toArray();
    }


}

