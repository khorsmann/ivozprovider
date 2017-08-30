<?php

namespace Ivoz\Domain\Model\Extension;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ExtensionDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $routeType;

    /**
     * @var string
     */
    private $numberValue;

    /**
     * @var string
     */
    private $friendValue;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $IvrCommonId;

    /**
     * @var mixed
     */
    private $IvrCustomId;

    /**
     * @var mixed
     */
    private $huntGroupId;

    /**
     * @var mixed
     */
    private $conferenceRoomId;

    /**
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $queueId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $IvrCommon;

    /**
     * @var mixed
     */
    private $IvrCustom;

    /**
     * @var mixed
     */
    private $huntGroup;

    /**
     * @var mixed
     */
    private $conferenceRoom;

    /**
     * @var mixed
     */
    private $user;

    /**
     * @var mixed
     */
    private $queue;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'number' => $this->getNumber(),
            'routeType' => $this->getRouteType(),
            'numberValue' => $this->getNumberValue(),
            'friendValue' => $this->getFriendValue(),
            'id' => $this->getId(),
            'companyId' => $this->getCompanyId(),
            'ivrCommonId' => $this->getIvrCommonId(),
            'ivrCustomId' => $this->getIvrCustomId(),
            'huntGroupId' => $this->getHuntGroupId(),
            'conferenceRoomId' => $this->getConferenceRoomId(),
            'userId' => $this->getUserId(),
            'queueId' => $this->getQueueId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->ivrCommon = $transformer->transform('Ivoz\\Domain\\Model\\IvrCommon\\IvrCommon', $this->getIvrCommonId());
        $this->ivrCustom = $transformer->transform('Ivoz\\Domain\\Model\\IvrCustom\\IvrCustom', $this->getIvrCustomId());
        $this->huntGroup = $transformer->transform('Ivoz\\Domain\\Model\\HuntGroup\\HuntGroup', $this->getHuntGroupId());
        $this->conferenceRoom = $transformer->transform('Ivoz\\Domain\\Model\\ConferenceRoom\\ConferenceRoom', $this->getConferenceRoomId());
        $this->user = $transformer->transform('Ivoz\\Domain\\Model\\User\\User', $this->getUserId());
        $this->queue = $transformer->transform('Ivoz\\Domain\\Model\\Queue\\Queue', $this->getQueueId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $number
     *
     * @return ExtensionDTO
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $routeType
     *
     * @return ExtensionDTO
     */
    public function setRouteType($routeType = null)
    {
        $this->routeType = $routeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getRouteType()
    {
        return $this->routeType;
    }

    /**
     * @param string $numberValue
     *
     * @return ExtensionDTO
     */
    public function setNumberValue($numberValue = null)
    {
        $this->numberValue = $numberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumberValue()
    {
        return $this->numberValue;
    }

    /**
     * @param string $friendValue
     *
     * @return ExtensionDTO
     */
    public function setFriendValue($friendValue = null)
    {
        $this->friendValue = $friendValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getFriendValue()
    {
        return $this->friendValue;
    }

    /**
     * @param integer $id
     *
     * @return ExtensionDTO
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
     * @param integer $companyId
     *
     * @return ExtensionDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Ivoz\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $ivrCommonId
     *
     * @return ExtensionDTO
     */
    public function setIvrCommonId($ivrCommonId)
    {
        $this->IvrCommonId = $ivrCommonId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getIvrCommonId()
    {
        return $this->IvrCommonId;
    }

    /**
     * @return \Ivoz\Domain\Model\IvrCommon\IvrCommon
     */
    public function getIvrCommon()
    {
        return $this->IvrCommon;
    }

    /**
     * @param integer $ivrCustomId
     *
     * @return ExtensionDTO
     */
    public function setIvrCustomId($ivrCustomId)
    {
        $this->IvrCustomId = $ivrCustomId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getIvrCustomId()
    {
        return $this->IvrCustomId;
    }

    /**
     * @return \Ivoz\Domain\Model\IvrCustom\IvrCustom
     */
    public function getIvrCustom()
    {
        return $this->IvrCustom;
    }

    /**
     * @param integer $huntGroupId
     *
     * @return ExtensionDTO
     */
    public function setHuntGroupId($huntGroupId)
    {
        $this->huntGroupId = $huntGroupId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHuntGroupId()
    {
        return $this->huntGroupId;
    }

    /**
     * @return \Ivoz\Domain\Model\HuntGroup\HuntGroup
     */
    public function getHuntGroup()
    {
        return $this->huntGroup;
    }

    /**
     * @param integer $conferenceRoomId
     *
     * @return ExtensionDTO
     */
    public function setConferenceRoomId($conferenceRoomId)
    {
        $this->conferenceRoomId = $conferenceRoomId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getConferenceRoomId()
    {
        return $this->conferenceRoomId;
    }

    /**
     * @return \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoom
     */
    public function getConferenceRoom()
    {
        return $this->conferenceRoom;
    }

    /**
     * @param integer $userId
     *
     * @return ExtensionDTO
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
     * @return \Ivoz\Domain\Model\User\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param integer $queueId
     *
     * @return ExtensionDTO
     */
    public function setQueueId($queueId)
    {
        $this->queueId = $queueId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getQueueId()
    {
        return $this->queueId;
    }

    /**
     * @return \Ivoz\Domain\Model\Queue\Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }
}

