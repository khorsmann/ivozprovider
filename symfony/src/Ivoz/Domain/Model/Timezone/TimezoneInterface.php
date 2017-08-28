<?php

namespace Ivoz\Domain\Model\Timezone;

use Core\Domain\Model\EntityInterface;

interface TimezoneInterface extends EntityInterface
{
    /**
     * Set tz
     *
     * @param string $tz
     *
     * @return self
     */
    public function setTz($tz);

    /**
     * Get tz
     *
     * @return string
     */
    public function getTz();

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return self
     */
    public function setComment($comment = null);

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment();

    /**
     * Set country
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $country
     *
     * @return self
     */
    public function setCountry(\Ivoz\Domain\Model\Country\CountryInterface $country = null);

    /**
     * Get country
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getCountry();

    /**
     * Set label
     *
     * @param Label $label
     *
     * @return self
     */
    public function setLabel(\Ivoz\Domain\Model\Timezone\Label $label);

    /**
     * Get label
     *
     * @return Label
     */
    public function getLabel();

}

