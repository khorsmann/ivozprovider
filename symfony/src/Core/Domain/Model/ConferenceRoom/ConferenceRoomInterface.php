<?php

namespace Core\Domain\Model\ConferenceRoom;



interface ConferenceRoomInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get pinProtected
     *
     * @return boolean
     */
    public function getPinProtected();


    /**
     * Get pinCode
     *
     * @return string
     */
    public function getPinCode();


    /**
     * Get maxMembers
     *
     * @return boolean
     */
    public function getMaxMembers();


    /**
     * Get company
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();



}

