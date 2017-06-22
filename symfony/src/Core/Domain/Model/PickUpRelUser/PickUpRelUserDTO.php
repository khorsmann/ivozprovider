<?php

namespace Core\Domain\Model\PickUpRelUser;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class PickUpRelUserDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $pickUpGroupId;

    /**
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $pickUpGroup;

    /**
     * @var mixed
     */
    private $user;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'pickUpGroupId' => $this->getPickUpGroupId(),
            'userId' => $this->getUserId()
        ];
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setPickUpGroupId(isset($data['pickUpGroupId']) ? $data['pickUpGroupId'] : null)
            ->setUserId(isset($data['userId']) ? $data['userId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->pickUpGroup = $transformer->transform('Core\\Domain\\Model\\PickUpGroup\\PickUpGroupInterface', $this->getPickUpGroupId());
        $this->user = $transformer->transform('Core\\Domain\\Model\\User\\UserInterface', $this->getUserId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return PickUpRelUserDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $pickUpGroupId
     *
     * @return PickUpRelUserDTO
     */
    public function setPickUpGroupId($pickUpGroupId)
    {
        $this->pickUpGroupId = $pickUpGroupId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPickUpGroupId()
    {
        return $this->pickUpGroupId;
    }

    /**
     * @return \Core\Domain\Model\PickUpGroup\PickUpGroupInterface
     */
    public function getPickUpGroup()
    {
        return $this->pickUpGroup;
    }

    /**
     * @param integer $userId
     *
     * @return PickUpRelUserDTO
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
}

