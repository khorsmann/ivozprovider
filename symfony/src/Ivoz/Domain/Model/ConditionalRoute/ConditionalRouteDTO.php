<?php

namespace Ivoz\Domain\Model\ConditionalRoute;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ConditionalRouteDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $routetype;

    /**
     * @var string
     */
    private $numbervalue;

    /**
     * @var string
     */
    private $friendvalue;

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
    private $ivrCommonId;

    /**
     * @var mixed
     */
    private $ivrCustomId;

    /**
     * @var mixed
     */
    private $huntGroupId;

    /**
     * @var mixed
     */
    private $voicemailUserId;

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
    private $locutionId;

    /**
     * @var mixed
     */
    private $conferenceRoomId;

    /**
     * @var mixed
     */
    private $extensionId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $ivrCommon;

    /**
     * @var mixed
     */
    private $ivrCustom;

    /**
     * @var mixed
     */
    private $huntGroup;

    /**
     * @var mixed
     */
    private $voicemailUser;

    /**
     * @var mixed
     */
    private $user;

    /**
     * @var mixed
     */
    private $queue;

    /**
     * @var mixed
     */
    private $locution;

    /**
     * @var mixed
     */
    private $conferenceRoom;

    /**
     * @var mixed
     */
    private $extension;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'name' => $this->getName(),
            'routetype' => $this->getRoutetype(),
            'numbervalue' => $this->getNumbervalue(),
            'friendvalue' => $this->getFriendvalue(),
            'id' => $this->getId(),
            'companyId' => $this->getCompanyId(),
            'ivrCommonId' => $this->getIvrCommonId(),
            'ivrCustomId' => $this->getIvrCustomId(),
            'huntGroupId' => $this->getHuntGroupId(),
            'voicemailUserId' => $this->getVoicemailUserId(),
            'userId' => $this->getUserId(),
            'queueId' => $this->getQueueId(),
            'locutionId' => $this->getLocutionId(),
            'conferenceRoomId' => $this->getConferenceRoomId(),
            'extensionId' => $this->getExtensionId()
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
        $this->voicemailUser = $transformer->transform('Ivoz\\Domain\\Model\\User\\User', $this->getVoicemailUserId());
        $this->user = $transformer->transform('Ivoz\\Domain\\Model\\User\\User', $this->getUserId());
        $this->queue = $transformer->transform('Ivoz\\Domain\\Model\\Queue\\Queue', $this->getQueueId());
        $this->locution = $transformer->transform('Ivoz\\Domain\\Model\\Locution\\Locution', $this->getLocutionId());
        $this->conferenceRoom = $transformer->transform('Ivoz\\Domain\\Model\\ConferenceRoom\\ConferenceRoom', $this->getConferenceRoomId());
        $this->extension = $transformer->transform('Ivoz\\Domain\\Model\\Extension\\Extension', $this->getExtensionId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $name
     *
     * @return ConditionalRouteDTO
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $routetype
     *
     * @return ConditionalRouteDTO
     */
    public function setRoutetype($routetype = null)
    {
        $this->routetype = $routetype;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoutetype()
    {
        return $this->routetype;
    }

    /**
     * @param string $numbervalue
     *
     * @return ConditionalRouteDTO
     */
    public function setNumbervalue($numbervalue = null)
    {
        $this->numbervalue = $numbervalue;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumbervalue()
    {
        return $this->numbervalue;
    }

    /**
     * @param string $friendvalue
     *
     * @return ConditionalRouteDTO
     */
    public function setFriendvalue($friendvalue = null)
    {
        $this->friendvalue = $friendvalue;

        return $this;
    }

    /**
     * @return string
     */
    public function getFriendvalue()
    {
        return $this->friendvalue;
    }

    /**
     * @param integer $id
     *
     * @return ConditionalRouteDTO
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
     * @return ConditionalRouteDTO
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
     * @return ConditionalRouteDTO
     */
    public function setIvrCommonId($ivrCommonId)
    {
        $this->ivrCommonId = $ivrCommonId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getIvrCommonId()
    {
        return $this->ivrCommonId;
    }

    /**
     * @return \Ivoz\Domain\Model\IvrCommon\IvrCommon
     */
    public function getIvrCommon()
    {
        return $this->ivrCommon;
    }

    /**
     * @param integer $ivrCustomId
     *
     * @return ConditionalRouteDTO
     */
    public function setIvrCustomId($ivrCustomId)
    {
        $this->ivrCustomId = $ivrCustomId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getIvrCustomId()
    {
        return $this->ivrCustomId;
    }

    /**
     * @return \Ivoz\Domain\Model\IvrCustom\IvrCustom
     */
    public function getIvrCustom()
    {
        return $this->ivrCustom;
    }

    /**
     * @param integer $huntGroupId
     *
     * @return ConditionalRouteDTO
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
     * @param integer $voicemailUserId
     *
     * @return ConditionalRouteDTO
     */
    public function setVoicemailUserId($voicemailUserId)
    {
        $this->voicemailUserId = $voicemailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getVoicemailUserId()
    {
        return $this->voicemailUserId;
    }

    /**
     * @return \Ivoz\Domain\Model\User\User
     */
    public function getVoicemailUser()
    {
        return $this->voicemailUser;
    }

    /**
     * @param integer $userId
     *
     * @return ConditionalRouteDTO
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
     * @return ConditionalRouteDTO
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

    /**
     * @param integer $locutionId
     *
     * @return ConditionalRouteDTO
     */
    public function setLocutionId($locutionId)
    {
        $this->locutionId = $locutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLocutionId()
    {
        return $this->locutionId;
    }

    /**
     * @return \Ivoz\Domain\Model\Locution\Locution
     */
    public function getLocution()
    {
        return $this->locution;
    }

    /**
     * @param integer $conferenceRoomId
     *
     * @return ConditionalRouteDTO
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
     * @param integer $extensionId
     *
     * @return ConditionalRouteDTO
     */
    public function setExtensionId($extensionId)
    {
        $this->extensionId = $extensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExtensionId()
    {
        return $this->extensionId;
    }

    /**
     * @return \Ivoz\Domain\Model\Extension\Extension
     */
    public function getExtension()
    {
        return $this->extension;
    }
}

