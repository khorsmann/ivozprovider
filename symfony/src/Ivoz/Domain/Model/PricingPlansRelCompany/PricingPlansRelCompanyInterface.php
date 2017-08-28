<?php

namespace Ivoz\Domain\Model\PricingPlansRelCompany;

use Core\Domain\Model\EntityInterface;

interface PricingPlansRelCompanyInterface extends EntityInterface
{
    /**
     * Set validFrom
     *
     * @param \DateTime $validFrom
     *
     * @return self
     */
    public function setValidFrom($validFrom);

    /**
     * Get validFrom
     *
     * @return \DateTime
     */
    public function getValidFrom();

    /**
     * Set validTo
     *
     * @param \DateTime $validTo
     *
     * @return self
     */
    public function setValidTo($validTo);

    /**
     * Get validTo
     *
     * @return \DateTime
     */
    public function getValidTo();

    /**
     * Set metric
     *
     * @param integer $metric
     *
     * @return self
     */
    public function setMetric($metric);

    /**
     * Get metric
     *
     * @return integer
     */
    public function getMetric();

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

