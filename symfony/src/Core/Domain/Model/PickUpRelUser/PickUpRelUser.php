<?php

namespace Core\Domain\Model\PickUpRelUser;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * PickUpRelUser
 */
class PickUpRelUser extends PickUpRelUserAbstract implements PickUpRelUserInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return PickUpRelUserDTO
     */
    public static function createDTO()
    {
        return new PickUpRelUserDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PickUpRelUserDTO
         */
        Assertion::isInstanceOf($dto, PickUpRelUserDTO::class);

        $self = new self();

        return $self
            ->setPickUpGroup($dto->getPickUpGroup())
            ->setUser($dto->getUser())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PickUpRelUserDTO
         */
        Assertion::isInstanceOf($dto, PickUpRelUserDTO::class);

        $this
            ->setPickUpGroup($dto->getPickUpGroup())
            ->setUser($dto->getUser());


        return $this;
    }

    /**
     * @return PickUpRelUserDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setPickUpGroupId($this->getPickUpGroup() ? $this->getPickUpGroup()->getId() : null)
            ->setUserId($this->getUser() ? $this->getUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'pickUpGroupId' => $this->getPickUpGroup() ? $this->getPickUpGroup()->getId() : null,
            'userId' => $this->getUser() ? $this->getUser()->getId() : null
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
     * Set pickUpGroup
     *
     * @param \Core\Domain\Model\PickUpGroup\PickUpGroupInterface $pickUpGroup
     *
     * @return self
     */
    protected function setPickUpGroup(\Core\Domain\Model\PickUpGroup\PickUpGroupInterface $pickUpGroup)
    {
        $this->pickUpGroup = $pickUpGroup;

        return $this;
    }

    /**
     * Get pickUpGroup
     *
     * @return \Core\Domain\Model\PickUpGroup\PickUpGroupInterface
     */
    public function getPickUpGroup()
    {
        return $this->pickUpGroup;
    }

    /**
     * Set user
     *
     * @param \Core\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    protected function setUser(\Core\Domain\Model\User\UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }


}

