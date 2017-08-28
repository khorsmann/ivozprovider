<?php

namespace Ivoz\Domain\Model\HuntGroupsRelUser;

use Core\Domain\Model\EntityInterface;

interface HuntGroupsRelUserInterface extends EntityInterface
{
    /**
     * Set timeoutTime
     *
     * @param integer $timeoutTime
     *
     * @return self
     */
    public function setTimeoutTime($timeoutTime = null);

    /**
     * Get timeoutTime
     *
     * @return integer
     */
    public function getTimeoutTime();

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority = null);

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority();

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
     * Set user
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    public function setUser(\Ivoz\Domain\Model\User\UserInterface $user);

    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser();

}

