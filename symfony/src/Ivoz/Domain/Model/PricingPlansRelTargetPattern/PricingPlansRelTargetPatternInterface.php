<?php

namespace Ivoz\Domain\Model\PricingPlansRelTargetPattern;

use Core\Domain\Model\EntityInterface;

interface PricingPlansRelTargetPatternInterface extends EntityInterface
{
    public function getCost($duration = null);

    /**
     * Set connectionCharge
     *
     * @param string $connectionCharge
     *
     * @return self
     */
    public function setConnectionCharge($connectionCharge);

    /**
     * Get connectionCharge
     *
     * @return string
     */
    public function getConnectionCharge();

    /**
     * Set periodTime
     *
     * @param integer $periodTime
     *
     * @return self
     */
    public function setPeriodTime($periodTime);

    /**
     * Get periodTime
     *
     * @return integer
     */
    public function getPeriodTime();

    /**
     * Set perPeriodCharge
     *
     * @param string $perPeriodCharge
     *
     * @return self
     */
    public function setPerPeriodCharge($perPeriodCharge);

    /**
     * Get perPeriodCharge
     *
     * @return string
     */
    public function getPerPeriodCharge();

    /**
     * Set pricingPlan
     *
     * @param \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface $pricingPlan
     *
     * @return self
     */
    public function setPricingPlan(\Ivoz\Domain\Model\PricingPlan\PricingPlanInterface $pricingPlan);

    /**
     * Get pricingPlan
     *
     * @return \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan();

    /**
     * Set targetPattern
     *
     * @param \Ivoz\Domain\Model\TargetPattern\TargetPatternInterface $targetPattern
     *
     * @return self
     */
    public function setTargetPattern(\Ivoz\Domain\Model\TargetPattern\TargetPatternInterface $targetPattern);

    /**
     * Get targetPattern
     *
     * @return \Ivoz\Domain\Model\TargetPattern\TargetPatternInterface
     */
    public function getTargetPattern();

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

}

