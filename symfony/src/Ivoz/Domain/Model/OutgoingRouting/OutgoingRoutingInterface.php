<?php

namespace Ivoz\Domain\Model\OutgoingRouting;

use Core\Domain\Model\EntityInterface;

interface OutgoingRoutingInterface extends EntityInterface
{
    /**
     * Set type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type = null);

    /**
     * Get type
     *
     * @return string
     */
    public function getType();

    /**
     * Set priority
     *
     * @param boolean $priority
     *
     * @return self
     */
    public function setPriority($priority);

    /**
     * Get priority
     *
     * @return boolean
     */
    public function getPriority();

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return self
     */
    public function setWeight($weight);

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight();

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand);

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company = null);

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();

    /**
     * Set peeringContract
     *
     * @param \Ivoz\Domain\Model\PeeringContract\PeeringContractInterface $peeringContract
     *
     * @return self
     */
    public function setPeeringContract(\Ivoz\Domain\Model\PeeringContract\PeeringContractInterface $peeringContract = null);

    /**
     * Get peeringContract
     *
     * @return \Ivoz\Domain\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract();

    /**
     * Set routingPattern
     *
     * @param \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern
     *
     * @return self
     */
    public function setRoutingPattern(\Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern = null);

    /**
     * Get routingPattern
     *
     * @return \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern();

    /**
     * Set routingPatternGroup
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup
     *
     * @return self
     */
    public function setRoutingPatternGroup(\Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup = null);

    /**
     * Get routingPatternGroup
     *
     * @return \Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    public function getRoutingPatternGroup();

    /**
     * Add lcrRule
     *
     * @param \Ivoz\Domain\Model\LcrRule\LcrRuleInterface $lcrRule
     *
     * @return OutgoingRoutingTrait
     */
    public function addLcrRule(\Ivoz\Domain\Model\LcrRule\LcrRuleInterface $lcrRule);

    /**
     * Remove lcrRule
     *
     * @param \Ivoz\Domain\Model\LcrRule\LcrRuleInterface $lcrRule
     */
    public function removeLcrRule(\Ivoz\Domain\Model\LcrRule\LcrRuleInterface $lcrRule);

    /**
     * Replace lcrRules
     *
     * @param \Ivoz\Domain\Model\LcrRule\LcrRuleInterface[] $lcrRules
     * @return self
     */
    public function replaceLcrRules(array $lcrRules);

    /**
     * Get lcrRules
     *
     * @return array
     */
    public function getLcrRules(\Doctrine\Common\Collections\Criteria $criteria = null);

}

