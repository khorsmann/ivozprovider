<?php

namespace Ivoz\Domain\Model\ConferenceRoom;

use Core\Domain\Model\EntityInterface;

interface ConferenceRoomInterface extends EntityInterface
{
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
     * Set pinProtected
     *
     * @param boolean $pinProtected
     *
     * @return self
     */
    public function setPinProtected($pinProtected);

    /**
     * Get pinProtected
     *
     * @return boolean
     */
    public function getPinProtected();

    /**
     * Set pinCode
     *
     * @param string $pinCode
     *
     * @return self
     */
    public function setPinCode($pinCode = null);

    /**
     * Get pinCode
     *
     * @return string
     */
    public function getPinCode();

    /**
     * Set maxMembers
     *
     * @param boolean $maxMembers
     *
     * @return self
     */
    public function setMaxMembers($maxMembers);

    /**
     * Get maxMembers
     *
     * @return boolean
     */
    public function getMaxMembers();

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

}

