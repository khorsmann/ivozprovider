<?php

namespace Ivoz\Domain\Model\IvrCommon;

use Core\Domain\Model\EntityInterface;

interface IvrCommonInterface extends EntityInterface
{
    /**
     * @return Locution[] with key=>value
     */
    public function getAllLocutions();

    /**
     * @param Criteria $criteria
     * @return null|Extension
     */
    public function getExtension(\Doctrine\Common\Collections\Criteria $criteria = null);

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
     * Set blackListRegExp
     *
     * @param string $blackListRegExp
     *
     * @return self
     */
    public function setBlackListRegExp($blackListRegExp = null);

    /**
     * Get blackListRegExp
     *
     * @return string
     */
    public function getBlackListRegExp();

    /**
     * Set timeout
     *
     * @param integer $timeout
     *
     * @return self
     */
    public function setTimeout($timeout);

    /**
     * Get timeout
     *
     * @return integer
     */
    public function getTimeout();

    /**
     * Set maxDigits
     *
     * @param integer $maxDigits
     *
     * @return self
     */
    public function setMaxDigits($maxDigits);

    /**
     * Get maxDigits
     *
     * @return integer
     */
    public function getMaxDigits();

    /**
     * Set noAnswerTimeout
     *
     * @param integer $noAnswerTimeout
     *
     * @return self
     */
    public function setNoAnswerTimeout($noAnswerTimeout = null);

    /**
     * Get noAnswerTimeout
     *
     * @return integer
     */
    public function getNoAnswerTimeout();

    /**
     * Set timeoutTargetType
     *
     * @param string $timeoutTargetType
     *
     * @return self
     */
    public function setTimeoutTargetType($timeoutTargetType = null);

    /**
     * Get timeoutTargetType
     *
     * @return string
     */
    public function getTimeoutTargetType();

    /**
     * Set timeoutNumberValue
     *
     * @param string $timeoutNumberValue
     *
     * @return self
     */
    public function setTimeoutNumberValue($timeoutNumberValue = null);

    /**
     * Get timeoutNumberValue
     *
     * @return string
     */
    public function getTimeoutNumberValue();

    /**
     * Set errorTargetType
     *
     * @param string $errorTargetType
     *
     * @return self
     */
    public function setErrorTargetType($errorTargetType = null);

    /**
     * Get errorTargetType
     *
     * @return string
     */
    public function getErrorTargetType();

    /**
     * Set errorNumberValue
     *
     * @param string $errorNumberValue
     *
     * @return self
     */
    public function setErrorNumberValue($errorNumberValue = null);

    /**
     * Get errorNumberValue
     *
     * @return string
     */
    public function getErrorNumberValue();

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
     * Set errorLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $errorLocution
     *
     * @return self
     */
    public function setErrorLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $errorLocution = null);

    /**
     * Get errorLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getErrorLocution();

    /**
     * Set successLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $successLocution
     *
     * @return self
     */
    public function setSuccessLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $successLocution = null);

    /**
     * Get successLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getSuccessLocution();

    /**
     * Set timeoutExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $timeoutExtension
     *
     * @return self
     */
    public function setTimeoutExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $timeoutExtension = null);

    /**
     * Get timeoutExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getTimeoutExtension();

    /**
     * Set errorExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $errorExtension
     *
     * @return self
     */
    public function setErrorExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $errorExtension = null);

    /**
     * Get errorExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getErrorExtension();

    /**
     * Set timeoutVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $timeoutVoiceMailUser
     *
     * @return self
     */
    public function setTimeoutVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $timeoutVoiceMailUser = null);

    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getTimeoutVoiceMailUser();

    /**
     * Set errorVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $errorVoiceMailUser
     *
     * @return self
     */
    public function setErrorVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $errorVoiceMailUser = null);

    /**
     * Get errorVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getErrorVoiceMailUser();

    /**
     * Add extension
     *
     * @param \Ivoz\Domain\Model\Extension\Extension $extension
     *
     * @return IvrCommonTrait
     */
    public function addExtension(\Ivoz\Domain\Model\Extension\Extension $extension);

    /**
     * Remove extension
     *
     * @param \Ivoz\Domain\Model\Extension\Extension $extension
     */
    public function removeExtension(\Ivoz\Domain\Model\Extension\Extension $extension);

    /**
     * Replace extensions
     *
     * @param \Ivoz\Domain\Model\Extension\Extension[] $extensions
     * @return self
     */
    public function replaceExtensions(array $extensions);

    /**
     * Get extensions
     *
     * @return array
     */
    public function getExtensions(\Doctrine\Common\Collections\Criteria $criteria = null);

}

