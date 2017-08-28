<?php

namespace Ivoz\Domain\Model\CallACLRelPattern;

use Core\Domain\Model\EntityInterface;

interface CallACLRelPatternInterface extends EntityInterface
{
    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority);

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority();

    /**
     * Set policy
     *
     * @param string $policy
     *
     * @return self
     */
    public function setPolicy($policy);

    /**
     * Get policy
     *
     * @return string
     */
    public function getPolicy();

    /**
     * Set callACL
     *
     * @param \Ivoz\Domain\Model\CallACL\CallACLInterface $callACL
     *
     * @return self
     */
    public function setCallACL(\Ivoz\Domain\Model\CallACL\CallACLInterface $callACL = null);

    /**
     * Get callACL
     *
     * @return \Ivoz\Domain\Model\CallACL\CallACLInterface
     */
    public function getCallACL();

    /**
     * Set callACLPattern
     *
     * @param \Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern
     *
     * @return self
     */
    public function setCallACLPattern(\Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern);

    /**
     * Get callACLPattern
     *
     * @return \Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface
     */
    public function getCallACLPattern();

}

