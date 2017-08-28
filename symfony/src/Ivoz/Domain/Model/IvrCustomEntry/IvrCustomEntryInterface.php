<?php

namespace Ivoz\Domain\Model\IvrCustomEntry;

use Core\Domain\Model\EntityInterface;

interface IvrCustomEntryInterface extends EntityInterface
{
    /**
     * Set entry
     *
     * @param string $entry
     *
     * @return self
     */
    public function setEntry($entry);

    /**
     * Get entry
     *
     * @return string
     */
    public function getEntry();

    /**
     * Set targetType
     *
     * @param string $targetType
     *
     * @return self
     */
    public function setTargetType($targetType);

    /**
     * Get targetType
     *
     * @return string
     */
    public function getTargetType();

    /**
     * Set targetNumberValue
     *
     * @param string $targetNumberValue
     *
     * @return self
     */
    public function setTargetNumberValue($targetNumberValue = null);

    /**
     * Get targetNumberValue
     *
     * @return string
     */
    public function getTargetNumberValue();

    /**
     * Set ivrCustom
     *
     * @param \Ivoz\Domain\Model\IvrCustom\IvrCustomInterface $ivrCustom
     *
     * @return self
     */
    public function setIvrCustom(\Ivoz\Domain\Model\IvrCustom\IvrCustomInterface $ivrCustom);

    /**
     * Get ivrCustom
     *
     * @return \Ivoz\Domain\Model\IvrCustom\IvrCustomInterface
     */
    public function getIvrCustom();

    /**
     * Set welcomeLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $welcomeLocution
     *
     * @return self
     */
    public function setWelcomeLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $welcomeLocution = null);

    /**
     * Get welcomeLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution();

    /**
     * Set targetExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $targetExtension
     *
     * @return self
     */
    public function setTargetExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $targetExtension = null);

    /**
     * Get targetExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getTargetExtension();

    /**
     * Set targetVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $targetVoiceMailUser
     *
     * @return self
     */
    public function setTargetVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $targetVoiceMailUser = null);

    /**
     * Get targetVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getTargetVoiceMailUser();

}

