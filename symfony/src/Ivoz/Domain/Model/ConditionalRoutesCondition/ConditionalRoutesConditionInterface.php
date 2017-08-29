<?php

namespace Ivoz\Domain\Model\ConditionalRoutesCondition;

use Core\Domain\Model\EntityInterface;

interface ConditionalRoutesConditionInterface extends EntityInterface
{
    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority);

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority();

    /**
     * Set routeType
     *
     * @param string $routeType
     *
     * @return self
     */
    public function setRouteType($routeType = null);

    /**
     * Get routeType
     *
     * @return string
     */
    public function getRouteType();

    /**
     * Set numberValue
     *
     * @param string $numberValue
     *
     * @return self
     */
    public function setNumberValue($numberValue = null);

    /**
     * Get numberValue
     *
     * @return string
     */
    public function getNumberValue();

    /**
     * Set friendValue
     *
     * @param string $friendValue
     *
     * @return self
     */
    public function setFriendValue($friendValue = null);

    /**
     * Get friendValue
     *
     * @return string
     */
    public function getFriendValue();

    /**
     * Set conditionalRoute
     *
     * @param \Ivoz\Domain\Model\ConditionalRoute\ConditionalRouteInterface $conditionalRoute
     *
     * @return self
     */
    public function setConditionalRoute(\Ivoz\Domain\Model\ConditionalRoute\ConditionalRouteInterface $conditionalRoute = null);

    /**
     * Get conditionalRoute
     *
     * @return \Ivoz\Domain\Model\ConditionalRoute\ConditionalRouteInterface
     */
    public function getConditionalRoute();

    /**
     * Set ivrCommon
     *
     * @param \Ivoz\Domain\Model\IvrCommon\IvrCommonInterface $ivrCommon
     *
     * @return self
     */
    public function setIvrCommon(\Ivoz\Domain\Model\IvrCommon\IvrCommonInterface $ivrCommon = null);

    /**
     * Get ivrCommon
     *
     * @return \Ivoz\Domain\Model\IvrCommon\IvrCommonInterface
     */
    public function getIvrCommon();

    /**
     * Set ivrCustom
     *
     * @param \Ivoz\Domain\Model\IvrCustom\IvrCustomInterface $ivrCustom
     *
     * @return self
     */
    public function setIvrCustom(\Ivoz\Domain\Model\IvrCustom\IvrCustomInterface $ivrCustom = null);

    /**
     * Get ivrCustom
     *
     * @return \Ivoz\Domain\Model\IvrCustom\IvrCustomInterface
     */
    public function getIvrCustom();

    /**
     * Set huntGroup
     *
     * @param \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup
     *
     * @return self
     */
    public function setHuntGroup(\Ivoz\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup = null);

    /**
     * Get huntGroup
     *
     * @return \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup();

    /**
     * Set voicemailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $voicemailUser
     *
     * @return self
     */
    public function setVoicemailUser(\Ivoz\Domain\Model\User\UserInterface $voicemailUser = null);

    /**
     * Get voicemailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getVoicemailUser();

    /**
     * Set user
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    public function setUser(\Ivoz\Domain\Model\User\UserInterface $user = null);

    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser();

    /**
     * Set queue
     *
     * @param \Ivoz\Domain\Model\Queue\QueueInterface $queue
     *
     * @return self
     */
    public function setQueue(\Ivoz\Domain\Model\Queue\QueueInterface $queue = null);

    /**
     * Get queue
     *
     * @return \Ivoz\Domain\Model\Queue\QueueInterface
     */
    public function getQueue();

    /**
     * Set locution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $locution
     *
     * @return self
     */
    public function setLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $locution = null);

    /**
     * Get locution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getLocution();

    /**
     * Set conferenceRoom
     *
     * @param \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom
     *
     * @return self
     */
    public function setConferenceRoom(\Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom = null);

    /**
     * Get conferenceRoom
     *
     * @return \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom();

    /**
     * Set extension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $extension
     *
     * @return self
     */
    public function setExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $extension = null);

    /**
     * Get extension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getExtension();

}

