<?php

namespace Ast\Domain\Model\PsAor;

use Core\Domain\Model\EntityInterface;

interface PsAorInterface extends EntityInterface
{
    /**
     * Set sorceryId
     *
     * @param string $sorceryId
     *
     * @return self
     */
    public function setSorceryId($sorceryId);

    /**
     * Get sorceryId
     *
     * @return string
     */
    public function getSorceryId();

    /**
     * Set defaultExpiration
     *
     * @param integer $defaultExpiration
     *
     * @return self
     */
    public function setDefaultExpiration($defaultExpiration = null);

    /**
     * Get defaultExpiration
     *
     * @return integer
     */
    public function getDefaultExpiration();

    /**
     * Set maxContacts
     *
     * @param integer $maxContacts
     *
     * @return self
     */
    public function setMaxContacts($maxContacts = null);

    /**
     * Get maxContacts
     *
     * @return integer
     */
    public function getMaxContacts();

    /**
     * Set minimumExpiration
     *
     * @param integer $minimumExpiration
     *
     * @return self
     */
    public function setMinimumExpiration($minimumExpiration = null);

    /**
     * Get minimumExpiration
     *
     * @return integer
     */
    public function getMinimumExpiration();

    /**
     * Set removeExisting
     *
     * @param string $removeExisting
     *
     * @return self
     */
    public function setRemoveExisting($removeExisting = null);

    /**
     * Get removeExisting
     *
     * @return string
     */
    public function getRemoveExisting();

    /**
     * Set authenticateQualify
     *
     * @param string $authenticateQualify
     *
     * @return self
     */
    public function setAuthenticateQualify($authenticateQualify = null);

    /**
     * Get authenticateQualify
     *
     * @return string
     */
    public function getAuthenticateQualify();

    /**
     * Set maximumExpiration
     *
     * @param integer $maximumExpiration
     *
     * @return self
     */
    public function setMaximumExpiration($maximumExpiration = null);

    /**
     * Get maximumExpiration
     *
     * @return integer
     */
    public function getMaximumExpiration();

    /**
     * Set supportPath
     *
     * @param string $supportPath
     *
     * @return self
     */
    public function setSupportPath($supportPath = null);

    /**
     * Get supportPath
     *
     * @return string
     */
    public function getSupportPath();

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return self
     */
    public function setContact($contact = null);

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact();

    /**
     * Set qualifyFrequency
     *
     * @param integer $qualifyFrequency
     *
     * @return self
     */
    public function setQualifyFrequency($qualifyFrequency = null);

    /**
     * Get qualifyFrequency
     *
     * @return integer
     */
    public function getQualifyFrequency();

}

