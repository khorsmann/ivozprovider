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
     * @var ArrayCollection
     */
    protected $peerServers;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());
        $this->outgoingRoutings = new ArrayCollection();
        $this->peerServers = new ArrayCollection();
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
            ->replacePeerServers($dto->getPeerServers())
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
            ->replaceOutgoingRoutings($dto->getOutgoingRoutings())
            ->replacePeerServers($dto->getPeerServers());


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
            ->setOutgoingRoutings($this->getOutgoingRoutings())
            ->setPeerServers($this->getPeerServers());
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

    /**
     * Add peerServer
     *
     * @param \Ivoz\Domain\Model\PeerServer\PeerServerInterface $peerServer
     *
     * @return PeeringContractTrait
     */
    public function addPeerServer(\Ivoz\Domain\Model\PeerServer\PeerServerInterface $peerServer)
    {
        $this->peerServers[] = $peerServer;

        return $this;
    }

    /**
     * Remove peerServer
     *
     * @param \Ivoz\Domain\Model\PeerServer\PeerServerInterface $peerServer
     */
    public function removePeerServer(\Ivoz\Domain\Model\PeerServer\PeerServerInterface $peerServer)
    {
        $this->peerServers->removeElement($peerServer);
    }

    /**
     * Replace peerServers
     *
     * @param \Ivoz\Domain\Model\PeerServer\PeerServerInterface[] $peerServers
     * @return self
     */
    public function replacePeerServers(array $peerServers)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($peerServers as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setPeeringContract($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->peerServers as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->peerServers[$key] = $updatedEntities[$identity];
            } else {
                $this->removePeerServer($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addPeerServer($entity);
        }

        return $this;
    }

    /**
     * Get peerServers
     *
     * @return array
     */
    public function getPeerServers(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->peerServers->matching($criteria)->toArray();
        }

        return $this->peerServers->toArray();
    }


}

