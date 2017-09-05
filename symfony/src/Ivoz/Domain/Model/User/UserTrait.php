<?php

namespace Ivoz\Domain\Model\User;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * UserTrait
 * @codeCoverageIgnore
 */
trait UserTrait
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $pickUpRelUsers;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());
        $this->pickUpRelUsers = new ArrayCollection();
    }

    /**
     * @return UserDTO
     */
    public static function createDTO()
    {
        return new UserDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UserDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replacePickUpRelUsers($dto->getPickUpRelUsers())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UserDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replacePickUpRelUsers($dto->getPickUpRelUsers());


        return $this;
    }

    /**
     * @return UserDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setPickUpRelUsers($this->getPickUpRelUsers());
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
     * Add pickUpRelUser
     *
     * @param \Ivoz\Domain\Model\PickUpRelUser\PickUpRelUserInterface $pickUpRelUser
     *
     * @return UserTrait
     */
    public function addPickUpRelUser(\Ivoz\Domain\Model\PickUpRelUser\PickUpRelUserInterface $pickUpRelUser)
    {
        $this->pickUpRelUsers[] = $pickUpRelUser;

        return $this;
    }

    /**
     * Remove pickUpRelUser
     *
     * @param \Ivoz\Domain\Model\PickUpRelUser\PickUpRelUserInterface $pickUpRelUser
     */
    public function removePickUpRelUser(\Ivoz\Domain\Model\PickUpRelUser\PickUpRelUserInterface $pickUpRelUser)
    {
        $this->pickUpRelUsers->removeElement($pickUpRelUser);
    }

    /**
     * Replace pickUpRelUsers
     *
     * @param \Ivoz\Domain\Model\PickUpRelUser\PickUpRelUserInterface[] $pickUpRelUsers
     * @return self
     */
    public function replacePickUpRelUsers(array $pickUpRelUsers)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($pickUpRelUsers as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setUser($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->pickUpRelUsers as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->pickUpRelUsers[$key] = $updatedEntities[$identity];
            } else {
                $this->removePickUpRelUser($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addPickUpRelUser($entity);
        }

        return $this;
    }

    /**
     * Get pickUpRelUsers
     *
     * @return array
     */
    public function getPickUpRelUsers(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->pickUpRelUsers->matching($criteria)->toArray();
        }

        return $this->pickUpRelUsers->toArray();
    }


}

