<?php

namespace Ivoz\Domain\Model\MatchList;

use Core\Domain\Model\EntityInterface;

interface MatchListInterface extends EntityInterface
{
    /**
     * Check if the given number matches the list rules
     *
     * @param string $number in E164 form
     * @return true if number matches, false otherwise
     */
    public function numberMatches($number);

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
     * Add pattern
     *
     * @param \Ivoz\Domain\Model\MatchListPattern\MatchListPattern $pattern
     *
     * @return MatchListTrait
     */
    public function addPattern(\Ivoz\Domain\Model\MatchListPattern\MatchListPattern $pattern);

    /**
     * Remove pattern
     *
     * @param \Ivoz\Domain\Model\MatchListPattern\MatchListPattern $pattern
     */
    public function removePattern(\Ivoz\Domain\Model\MatchListPattern\MatchListPattern $pattern);

    /**
     * Replace patterns
     *
     * @param \Ivoz\Domain\Model\MatchListPattern\MatchListPattern[] $patterns
     * @return self
     */
    public function replacePatterns(array $patterns);

    /**
     * Get patterns
     *
     * @return array
     */
    public function getPatterns(\Doctrine\Common\Collections\Criteria $criteria = null);

}

