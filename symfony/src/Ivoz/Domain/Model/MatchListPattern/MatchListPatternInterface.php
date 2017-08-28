<?php

namespace Ivoz\Domain\Model\MatchListPattern;

use Core\Domain\Model\EntityInterface;

interface MatchListPatternInterface extends EntityInterface
{
    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type);

    /**
     * Get type
     *
     * @return string
     */
    public function getType();

    /**
     * Set regexp
     *
     * @param string $regexp
     *
     * @return self
     */
    public function setRegexp($regexp = null);

    /**
     * Get regexp
     *
     * @return string
     */
    public function getRegexp();

    /**
     * Set numbervalue
     *
     * @param string $numbervalue
     *
     * @return self
     */
    public function setNumbervalue($numbervalue = null);

    /**
     * Get numbervalue
     *
     * @return string
     */
    public function getNumbervalue();

    /**
     * Set matchList
     *
     * @param \Ivoz\Domain\Model\MatchList\MatchListInterface $matchList
     *
     * @return self
     */
    public function setMatchList(\Ivoz\Domain\Model\MatchList\MatchListInterface $matchList);

    /**
     * Get matchList
     *
     * @return \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchList();

    /**
     * Set matchListPattern
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $matchListPattern
     *
     * @return self
     */
    public function setMatchListPattern(\Ivoz\Domain\Model\Country\CountryInterface $matchListPattern = null);

    /**
     * Get matchListPattern
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getMatchListPattern();

}

