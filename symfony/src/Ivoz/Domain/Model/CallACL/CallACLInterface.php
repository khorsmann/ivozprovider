<?php

namespace Ivoz\Domain\Model\CallACL;

use Core\Domain\Model\EntityInterface;

interface CallACLInterface extends EntityInterface
{
    public function dstIsCallable($dst);

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
     * Set defaultPolicy
     *
     * @param string $defaultPolicy
     *
     * @return self
     */
    public function setDefaultPolicy($defaultPolicy);

    /**
     * Get defaultPolicy
     *
     * @return string
     */
    public function getDefaultPolicy();

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
     * Add relPattern
     *
     * @param \Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPatternInterface $relPattern
     *
     * @return CallACLTrait
     */
    public function addRelPattern(\Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPatternInterface $relPattern);

    /**
     * Remove relPattern
     *
     * @param \Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPatternInterface $relPattern
     */
    public function removeRelPattern(\Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPatternInterface $relPattern);

    /**
     * Replace relPatterns
     *
     * @param \Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPatternInterface[] $relPatterns
     * @return self
     */
    public function replaceRelPatterns(array $relPatterns);

    /**
     * Get relPatterns
     *
     * @return array
     */
    public function getRelPatterns(\Doctrine\Common\Collections\Criteria $criteria = null);

}

