<?php

namespace Ivoz\Domain\Model\PeerServer;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * PeerServerTrait
 * @codeCoverageIgnore
 */
trait PeerServerTrait
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $lcrGateways;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());
        $this->lcrGateways = new ArrayCollection();
    }

    /**
     * @return PeerServerDTO
     */
    public static function createDTO()
    {
        return new PeerServerDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PeerServerDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replaceLcrGateways($dto->getLcrGateways())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PeerServerDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replaceLcrGateways($dto->getLcrGateways());


        return $this;
    }

    /**
     * @return PeerServerDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setLcrGateways($this->getLcrGateways());
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
     * Add lcrGateway
     *
     * @param \Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface $lcrGateway
     *
     * @return PeerServerTrait
     */
    public function addLcrGateway(\Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface $lcrGateway)
    {
        $this->lcrGateways[] = $lcrGateway;

        return $this;
    }

    /**
     * Remove lcrGateway
     *
     * @param \Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface $lcrGateway
     */
    public function removeLcrGateway(\Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface $lcrGateway)
    {
        $this->lcrGateways->removeElement($lcrGateway);
    }

    /**
     * Replace lcrGateways
     *
     * @param \Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface[] $lcrGateways
     * @return self
     */
    public function replaceLcrGateways(array $lcrGateways)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($lcrGateways as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setPeerServer($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->lcrGateways as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->lcrGateways[$key] = $updatedEntities[$identity];
            } else {
                $this->removeLcrGateway($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addLcrGateway($entity);
        }

        return $this;
    }

    /**
     * Get lcrGateways
     *
     * @return array
     */
    public function getLcrGateways(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->lcrGateways->matching($criteria)->toArray();
        }

        return $this->lcrGateways->toArray();
    }


}

