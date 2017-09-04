<?php

namespace Ivoz\Domain\Model\RetailAccount;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * RetailAccountTrait
 * @codeCoverageIgnore
 */
trait RetailAccountTrait
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $psEndpoints;

    /**
     * @var ArrayCollection
     */
    protected $DDIs;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());
        $this->psEndpoints = new ArrayCollection();
        $this->DDIs = new ArrayCollection();
    }

    /**
     * @return RetailAccountDTO
     */
    public static function createDTO()
    {
        return new RetailAccountDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RetailAccountDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replacePsEndpoints($dto->getPsEndpoints())
            ->replaceDDIs($dto->getDDIs())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RetailAccountDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replacePsEndpoints($dto->getPsEndpoints())
            ->replaceDDIs($dto->getDDIs());


        return $this;
    }

    /**
     * @return RetailAccountDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setPsEndpoints($this->getPsEndpoints())
            ->setDDIs($this->getDDIs());
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
     * Add psEndpoint
     *
     * @param \Ast\Domain\Model\PsEndpoint\PsEndpointInterface $psEndpoint
     *
     * @return RetailAccountTrait
     */
    public function addPsEndpoint(\Ast\Domain\Model\PsEndpoint\PsEndpointInterface $psEndpoint)
    {
        $this->psEndpoints[] = $psEndpoint;

        return $this;
    }

    /**
     * Remove psEndpoint
     *
     * @param \Ast\Domain\Model\PsEndpoint\PsEndpointInterface $psEndpoint
     */
    public function removePsEndpoint(\Ast\Domain\Model\PsEndpoint\PsEndpointInterface $psEndpoint)
    {
        $this->psEndpoints->removeElement($psEndpoint);
    }

    /**
     * Replace psEndpoints
     *
     * @param \Ast\Domain\Model\PsEndpoint\PsEndpointInterface[] $psEndpoints
     * @return self
     */
    public function replacePsEndpoints(array $psEndpoints)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($psEndpoints as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setRetailAccount($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->psEndpoints as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->psEndpoints[$key] = $updatedEntities[$identity];
            } else {
                $this->removePsEndpoint($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addPsEndpoint($entity);
        }

        return $this;
    }

    /**
     * Get psEndpoints
     *
     * @return array
     */
    public function getPsEndpoints(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->psEndpoints->matching($criteria)->toArray();
        }

        return $this->psEndpoints->toArray();
    }

    /**
     * Add dDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $dDI
     *
     * @return RetailAccountTrait
     */
    public function addDDI(\Ivoz\Domain\Model\DDI\DDIInterface $dDI)
    {
        $this->DDIs[] = $dDI;

        return $this;
    }

    /**
     * Remove dDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $dDI
     */
    public function removeDDI(\Ivoz\Domain\Model\DDI\DDIInterface $dDI)
    {
        $this->DDIs->removeElement($dDI);
    }

    /**
     * Replace dDIs
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface[] $dDIs
     * @return self
     */
    public function replaceDDIs(array $dDIs)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($dDIs as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setRetailAccount($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->DDIs as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->DDIs[$key] = $updatedEntities[$identity];
            } else {
                $this->removeDDI($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addDDI($entity);
        }

        return $this;
    }

    /**
     * Get dDIs
     *
     * @return array
     */
    public function getDDIs(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->DDIs->matching($criteria)->toArray();
        }

        return $this->DDIs->toArray();
    }


}

