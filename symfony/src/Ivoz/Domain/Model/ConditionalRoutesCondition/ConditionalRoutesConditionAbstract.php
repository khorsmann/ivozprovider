<?php

namespace Ivoz\Domain\Model\ConditionalRoutesCondition;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ConditionalRoutesConditionAbstract
 * @codeCoverageIgnore
 */
abstract class ConditionalRoutesConditionAbstract
{
    /**
     * @var integer
     */
    protected $priority = '1';

    /**
     * @comment enum:user|number|IVRCommon|IVRCustom|huntGroup|voicemail|friend|queue|conferenceRoom|extension
     * @var string
     */
    protected $routeType;

    /**
     * @var string
     */
    protected $numberValue;

    /**
     * @var string
     */
    protected $friendValue;

    /**
     * @var \Ivoz\Domain\Model\ConditionalRoute\ConditionalRouteInterface
     */
    protected $conditionalRoute;

    /**
     * @var \Ivoz\Domain\Model\IvrCommon\IvrCommonInterface
     */
    protected $ivrCommon;

    /**
     * @var \Ivoz\Domain\Model\IvrCustom\IvrCustomInterface
     */
    protected $ivrCustom;

    /**
     * @var \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface
     */
    protected $huntGroup;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
     */
    protected $voicemailUser;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
     */
    protected $user;

    /**
     * @var \Ivoz\Domain\Model\Queue\QueueInterface
     */
    protected $queue;

    /**
     * @var \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    protected $locution;

    /**
     * @var \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    protected $conferenceRoom;

    /**
     * @var \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    protected $extension;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($priority)
    {
        $this->setPriority($priority);
        $this->initChangelog();
    }

    /**
     * @param string $fieldName
     * @return mixed
     * @throws \Exception
     */
    public function initChangelog()
    {
        $this->_initialValues = $this->__toArray();
    }

    /**
     * @param string $fieldName
     * @return mixed
     * @throws \Exception
     */
    public function hasChanged($fieldName)
    {
        if (array_key_exists($fieldName, $this->_initialValues)) {
            throw new \Exception($fieldName . ' field was not found');
        }
        $getter = 'get' . ucfisrt($fieldName);

        return $this->$getter() != $this->_initialValues[$fieldName];
    }

    public function getInitialValue($fieldName)
    {
        if (array_key_exists($fieldName, $this->_initialValues)) {
            throw new \Exception($fieldName . ' field was not found');
        }

        return $this->_initialValues[$fieldName];
    }

    /**
     * @return ConditionalRoutesConditionDTO
     */
    public static function createDTO()
    {
        return new ConditionalRoutesConditionDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConditionalRoutesConditionDTO
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionDTO::class);

        $self = new static(
            $dto->getPriority());

        return $self
            ->setRouteType($dto->getRouteType())
            ->setNumberValue($dto->getNumberValue())
            ->setFriendValue($dto->getFriendValue())
            ->setConditionalRoute($dto->getConditionalRoute())
            ->setIvrCommon($dto->getIvrCommon())
            ->setIvrCustom($dto->getIvrCustom())
            ->setHuntGroup($dto->getHuntGroup())
            ->setVoicemailUser($dto->getVoicemailUser())
            ->setUser($dto->getUser())
            ->setQueue($dto->getQueue())
            ->setLocution($dto->getLocution())
            ->setConferenceRoom($dto->getConferenceRoom())
            ->setExtension($dto->getExtension())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConditionalRoutesConditionDTO
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionDTO::class);

        $this
            ->setPriority($dto->getPriority())
            ->setRouteType($dto->getRouteType())
            ->setNumberValue($dto->getNumberValue())
            ->setFriendValue($dto->getFriendValue())
            ->setConditionalRoute($dto->getConditionalRoute())
            ->setIvrCommon($dto->getIvrCommon())
            ->setIvrCustom($dto->getIvrCustom())
            ->setHuntGroup($dto->getHuntGroup())
            ->setVoicemailUser($dto->getVoicemailUser())
            ->setUser($dto->getUser())
            ->setQueue($dto->getQueue())
            ->setLocution($dto->getLocution())
            ->setConferenceRoom($dto->getConferenceRoom())
            ->setExtension($dto->getExtension());


        return $this;
    }

    /**
     * @return ConditionalRoutesConditionDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setPriority($this->getPriority())
            ->setRouteType($this->getRouteType())
            ->setNumberValue($this->getNumberValue())
            ->setFriendValue($this->getFriendValue())
            ->setConditionalRouteId($this->getConditionalRoute() ? $this->getConditionalRoute()->getId() : null)
            ->setIvrCommonId($this->getIvrCommon() ? $this->getIvrCommon()->getId() : null)
            ->setIvrCustomId($this->getIvrCustom() ? $this->getIvrCustom()->getId() : null)
            ->setHuntGroupId($this->getHuntGroup() ? $this->getHuntGroup()->getId() : null)
            ->setVoicemailUserId($this->getVoicemailUser() ? $this->getVoicemailUser()->getId() : null)
            ->setUserId($this->getUser() ? $this->getUser()->getId() : null)
            ->setQueueId($this->getQueue() ? $this->getQueue()->getId() : null)
            ->setLocutionId($this->getLocution() ? $this->getLocution()->getId() : null)
            ->setConferenceRoomId($this->getConferenceRoom() ? $this->getConferenceRoom()->getId() : null)
            ->setExtensionId($this->getExtension() ? $this->getExtension()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'priority' => $this->getPriority(),
            'routeType' => $this->getRouteType(),
            'numberValue' => $this->getNumberValue(),
            'friendValue' => $this->getFriendValue(),
            'conditionalRouteId' => $this->getConditionalRoute() ? $this->getConditionalRoute()->getId() : null,
            'ivrCommonId' => $this->getIvrCommon() ? $this->getIvrCommon()->getId() : null,
            'ivrCustomId' => $this->getIvrCustom() ? $this->getIvrCustom()->getId() : null,
            'huntGroupId' => $this->getHuntGroup() ? $this->getHuntGroup()->getId() : null,
            'voicemailUserId' => $this->getVoicemailUser() ? $this->getVoicemailUser()->getId() : null,
            'userId' => $this->getUser() ? $this->getUser()->getId() : null,
            'queueId' => $this->getQueue() ? $this->getQueue()->getId() : null,
            'locutionId' => $this->getLocution() ? $this->getLocution()->getId() : null,
            'conferenceRoomId' => $this->getConferenceRoom() ? $this->getConferenceRoom()->getId() : null,
            'extensionId' => $this->getExtension() ? $this->getExtension()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority)
    {
        Assertion::notNull($priority);
        Assertion::integerish($priority);

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set routeType
     *
     * @param string $routeType
     *
     * @return self
     */
    public function setRouteType($routeType = null)
    {
        if (!is_null($routeType)) {
            Assertion::maxLength($routeType, 25);
        Assertion::choice($routeType, array (
          0 => '    user',
          1 => '    number',
          2 => '    IVRCommon',
          3 => '    IVRCustom',
          4 => '    huntGroup',
          5 => '    voicemail',
          6 => '    friend',
          7 => '    queue',
          8 => '    conferenceRoom',
          9 => '    extension',
        ));
        }

        $this->routeType = $routeType;

        return $this;
    }

    /**
     * Get routeType
     *
     * @return string
     */
    public function getRouteType()
    {
        return $this->routeType;
    }

    /**
     * Set numberValue
     *
     * @param string $numberValue
     *
     * @return self
     */
    public function setNumberValue($numberValue = null)
    {
        if (!is_null($numberValue)) {
            Assertion::maxLength($numberValue, 25);
        }

        $this->numberValue = $numberValue;

        return $this;
    }

    /**
     * Get numberValue
     *
     * @return string
     */
    public function getNumberValue()
    {
        return $this->numberValue;
    }

    /**
     * Set friendValue
     *
     * @param string $friendValue
     *
     * @return self
     */
    public function setFriendValue($friendValue = null)
    {
        if (!is_null($friendValue)) {
            Assertion::maxLength($friendValue, 25);
        }

        $this->friendValue = $friendValue;

        return $this;
    }

    /**
     * Get friendValue
     *
     * @return string
     */
    public function getFriendValue()
    {
        return $this->friendValue;
    }

    /**
     * Set conditionalRoute
     *
     * @param \Ivoz\Domain\Model\ConditionalRoute\ConditionalRouteInterface $conditionalRoute
     *
     * @return self
     */
    public function setConditionalRoute(\Ivoz\Domain\Model\ConditionalRoute\ConditionalRouteInterface $conditionalRoute = null)
    {
        $this->conditionalRoute = $conditionalRoute;

        return $this;
    }

    /**
     * Get conditionalRoute
     *
     * @return \Ivoz\Domain\Model\ConditionalRoute\ConditionalRouteInterface
     */
    public function getConditionalRoute()
    {
        return $this->conditionalRoute;
    }

    /**
     * Set ivrCommon
     *
     * @param \Ivoz\Domain\Model\IvrCommon\IvrCommonInterface $ivrCommon
     *
     * @return self
     */
    public function setIvrCommon(\Ivoz\Domain\Model\IvrCommon\IvrCommonInterface $ivrCommon = null)
    {
        $this->ivrCommon = $ivrCommon;

        return $this;
    }

    /**
     * Get ivrCommon
     *
     * @return \Ivoz\Domain\Model\IvrCommon\IvrCommonInterface
     */
    public function getIvrCommon()
    {
        return $this->ivrCommon;
    }

    /**
     * Set ivrCustom
     *
     * @param \Ivoz\Domain\Model\IvrCustom\IvrCustomInterface $ivrCustom
     *
     * @return self
     */
    public function setIvrCustom(\Ivoz\Domain\Model\IvrCustom\IvrCustomInterface $ivrCustom = null)
    {
        $this->ivrCustom = $ivrCustom;

        return $this;
    }

    /**
     * Get ivrCustom
     *
     * @return \Ivoz\Domain\Model\IvrCustom\IvrCustomInterface
     */
    public function getIvrCustom()
    {
        return $this->ivrCustom;
    }

    /**
     * Set huntGroup
     *
     * @param \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup
     *
     * @return self
     */
    public function setHuntGroup(\Ivoz\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup = null)
    {
        $this->huntGroup = $huntGroup;

        return $this;
    }

    /**
     * Get huntGroup
     *
     * @return \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup()
    {
        return $this->huntGroup;
    }

    /**
     * Set voicemailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $voicemailUser
     *
     * @return self
     */
    public function setVoicemailUser(\Ivoz\Domain\Model\User\UserInterface $voicemailUser = null)
    {
        $this->voicemailUser = $voicemailUser;

        return $this;
    }

    /**
     * Get voicemailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getVoicemailUser()
    {
        return $this->voicemailUser;
    }

    /**
     * Set user
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    public function setUser(\Ivoz\Domain\Model\User\UserInterface $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set queue
     *
     * @param \Ivoz\Domain\Model\Queue\QueueInterface $queue
     *
     * @return self
     */
    public function setQueue(\Ivoz\Domain\Model\Queue\QueueInterface $queue = null)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue
     *
     * @return \Ivoz\Domain\Model\Queue\QueueInterface
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * Set locution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $locution
     *
     * @return self
     */
    public function setLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $locution = null)
    {
        $this->locution = $locution;

        return $this;
    }

    /**
     * Get locution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getLocution()
    {
        return $this->locution;
    }

    /**
     * Set conferenceRoom
     *
     * @param \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom
     *
     * @return self
     */
    public function setConferenceRoom(\Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom = null)
    {
        $this->conferenceRoom = $conferenceRoom;

        return $this;
    }

    /**
     * Get conferenceRoom
     *
     * @return \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom()
    {
        return $this->conferenceRoom;
    }

    /**
     * Set extension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $extension
     *
     * @return self
     */
    public function setExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $extension = null)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getExtension()
    {
        return $this->extension;
    }



    // @codeCoverageIgnoreEnd
}

