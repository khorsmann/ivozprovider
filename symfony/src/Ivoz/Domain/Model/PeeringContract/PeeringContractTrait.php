<?php

namespace Ivoz\Domain\Model\PeeringContract;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * PeeringContractTrait
 * @codeCoverageIgnore
 */
trait PeeringContractTrait
{
    /**
     * @var integer
     */
    protected $id;

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
        $this->outgoingRoutings = new ArrayCollection();
    }

    /**
     * @return PeeringContractDTO
     */
    public static function createDTO()
    {
        return new PeeringContractDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PeeringContractDTO
         */
        $self = parent::fromDTO($dto);

        return $self
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
         * @var $dto PeeringContractDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replaceOutgoingRoutings($dto->getOutgoingRoutings());


        return $this;
    }

    /**
     * @return PeeringContractDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
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
     * Add outgoingRouting
     *
     * @param \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     *
     * @return PeeringContractTrait
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
            $entity->setPeeringContract($this);
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

