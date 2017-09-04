<?php

namespace Ivoz\Domain\Model\RoutingPatternGroup;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * RoutingPatternGroupTrait
 * @codeCoverageIgnore
 */
trait RoutingPatternGroupTrait
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $relPatterns;

    /**
     * @var ArrayCollection
     */
    protected $outgoingRoutings;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());
        $this->relPatterns = new ArrayCollection();
        $this->outgoingRoutings = new ArrayCollection();
    }

    /**
     * @return RoutingPatternGroupDTO
     */
    public static function createDTO()
    {
        return new RoutingPatternGroupDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RoutingPatternGroupDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replaceRelPatterns($dto->getRelPatterns())
            ->replaceOutgoingRoutings($dto->getOutgoingRoutings())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RoutingPatternGroupDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replaceRelPatterns($dto->getRelPatterns())
            ->replaceOutgoingRoutings($dto->getOutgoingRoutings());


        return $this;
    }

    /**
     * @return RoutingPatternGroupDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setRelPatterns($this->getRelPatterns())
            ->setOutgoingRoutings($this->getOutgoingRoutings());
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
     * Add relPattern
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern
     *
     * @return RoutingPatternGroupTrait
     */
    public function addRelPattern(\Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern)
    {
        $this->relPatterns[] = $relPattern;

        return $this;
    }

    /**
     * Remove relPattern
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern
     */
    public function removeRelPattern(\Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern)
    {
        $this->relPatterns->removeElement($relPattern);
    }

    /**
     * Replace relPatterns
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface[] $relPatterns
     * @return self
     */
    public function replaceRelPatterns(array $relPatterns)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($relPatterns as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setRoutingPatternGroup($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->relPatterns as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->relPatterns[$key] = $updatedEntities[$identity];
            } else {
                $this->removeRelPattern($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addRelPattern($entity);
        }

        return $this;
    }

    /**
     * Get relPatterns
     *
     * @return array
     */
    public function getRelPatterns(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->relPatterns->matching($criteria)->toArray();
        }

        return $this->relPatterns->toArray();
    }

    /**
     * Add outgoingRouting
     *
     * @param \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     *
     * @return RoutingPatternGroupTrait
     */
    public function addOutgoingRouting(\Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting)
    {
        $this->outgoingRoutings[] = $outgoingRouting;

        return $this;
    }

    /**
     * Remove outgoingRouting
     *
     * @param \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     */
    public function removeOutgoingRouting(\Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting)
    {
        $this->outgoingRoutings->removeElement($outgoingRouting);
    }

    /**
     * Replace outgoingRoutings
     *
     * @param \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface[] $outgoingRoutings
     * @return self
     */
    public function replaceOutgoingRoutings(array $outgoingRoutings)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($outgoingRoutings as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setRoutingPatternGroup($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->outgoingRoutings as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->outgoingRoutings[$key] = $updatedEntities[$identity];
            } else {
                $this->removeOutgoingRouting($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addOutgoingRouting($entity);
        }

        return $this;
    }

    /**
     * Get outgoingRoutings
     *
     * @return array
     */
    public function getOutgoingRoutings(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->outgoingRoutings->matching($criteria)->toArray();
        }

        return $this->outgoingRoutings->toArray();
    }


}

