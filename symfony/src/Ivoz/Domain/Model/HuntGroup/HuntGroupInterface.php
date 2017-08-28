<?php

namespace Ivoz\Domain\Model\HuntGroup;

use Core\Domain\Model\EntityInterface;

interface HuntGroupInterface extends EntityInterface
{
    /**
     * Get this Hungroup related users
     * @return User[]
     */
    public function getHuntGroupUsersArray();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set strategy
     *
     * @param string $strategy
     *
     * @return self
     */
    public function setStrategy($strategy);

    /**
     * Get strategy
     *
     * @return string
     */
    public function getStrategy();

    /**
     * Set ringAllTimeout
     *
     * @param integer $ringAllTimeout
     *
     * @return self
     */
    public function setRingAllTimeout($ringAllTimeout);

    /**
     * Get ringAllTimeout
     *
     * @return integer
     */
    public function getRingAllTimeout();

    /**
     * Set nextUserPosition
     *
     * @param integer $nextUserPosition
     *
     * @return self
     */
    public function setNextUserPosition($nextUserPosition = null);

    /**
     * Get nextUserPosition
     *
     * @return integer
     */
    public function getNextUserPosition();

    /**
     * Set noAnswerTargetType
     *
     * @param string $noAnswerTargetType
     *
     * @return self
     */
    public function setNoAnswerTargetType($noAnswerTargetType = null);

    /**
     * Get noAnswerTargetType
     *
     * @return string
     */
    public function getNoAnswerTargetType();

    /**
     * Set noAnswerNumberValue
     *
     * @param string $noAnswerNumberValue
     *
     * @return self
     */
    public function setNoAnswerNumberValue($noAnswerNumberValue = null);

    /**
     * Get noAnswerNumberValue
     *
     * @return string
     */
    public function getNoAnswerNumberValue();

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company);

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();

    /**
     * Set noAnswerLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $noAnswerLocution
     *
     * @return self
     */
    public function setNoAnswerLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $noAnswerLocution = null);

    /**
     * Get noAnswerLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getNoAnswerLocution();

    /**
     * Set noAnswerExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $noAnswerExtension
     *
     * @return self
     */
    public function setNoAnswerExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $noAnswerExtension = null);

    /**
     * Get noAnswerExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getNoAnswerExtension();

    /**
     * Set noAnswerVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $noAnswerVoiceMailUser
     *
     * @return self
     */
    public function setNoAnswerVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $noAnswerVoiceMailUser = null);

    /**
     * Get noAnswerVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getNoAnswerVoiceMailUser();

    /**
     * Add huntGroupsRelUser
     *
     * @param \Ivoz\Domain\Model\HuntGroupsRelUser\HuntGroupsRelUserInterface $huntGroupsRelUser
     *
     * @return HuntGroupTrait
     */
    public function addHuntGroupsRelUser(\Ivoz\Domain\Model\HuntGroupsRelUser\HuntGroupsRelUserInterface $huntGroupsRelUser);

    /**
     * Remove huntGroupsRelUser
     *
     * @param \Ivoz\Domain\Model\HuntGroupsRelUser\HuntGroupsRelUserInterface $huntGroupsRelUser
     */
    public function removeHuntGroupsRelUser(\Ivoz\Domain\Model\HuntGroupsRelUser\HuntGroupsRelUserInterface $huntGroupsRelUser);

    /**
     * Replace huntGroupsRelUsers
     *
     * @param \Ivoz\Domain\Model\HuntGroupsRelUser\HuntGroupsRelUserInterface[] $huntGroupsRelUsers
     * @return self
     */
    public function replaceHuntGroupsRelUsers(array $huntGroupsRelUsers);

    /**
     * Get huntGroupsRelUsers
     *
     * @return array
     */
    public function getHuntGroupsRelUsers(\Doctrine\Common\Collections\Criteria $criteria = null);

}

