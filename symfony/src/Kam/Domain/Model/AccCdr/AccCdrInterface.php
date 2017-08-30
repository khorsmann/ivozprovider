<?php

namespace Kam\Domain\Model\AccCdr;

use Core\Domain\Model\EntityInterface;

interface AccCdrInterface extends EntityInterface
{
    /**
     * @todo move this to its own service
     */
    public function tarificate($plan = null);

    /**
     * @return bool
     */
    public function isBounced();

    /**
     * Set proxy
     *
     * @param string $proxy
     *
     * @return self
     */
    public function setProxy($proxy = null);

    /**
     * Get proxy
     *
     * @return string
     */
    public function getProxy();

    /**
     * Set startTimeUtc
     *
     * @param \DateTime $startTimeUtc
     *
     * @return self
     */
    public function setStartTimeUtc($startTimeUtc);

    /**
     * Get startTimeUtc
     *
     * @return \DateTime
     */
    public function getStartTimeUtc();

    /**
     * Set endTimeUtc
     *
     * @param \DateTime $endTimeUtc
     *
     * @return self
     */
    public function setEndTimeUtc($endTimeUtc);

    /**
     * Get endTimeUtc
     *
     * @return \DateTime
     */
    public function getEndTimeUtc();

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return self
     */
    public function setStartTime($startTime);

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime();

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     *
     * @return self
     */
    public function setEndTime($endTime);

    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime();

    /**
     * Set duration
     *
     * @param float $duration
     *
     * @return self
     */
    public function setDuration($duration);

    /**
     * Get duration
     *
     * @return float
     */
    public function getDuration();

    /**
     * Set caller
     *
     * @param string $caller
     *
     * @return self
     */
    public function setCaller($caller = null);

    /**
     * Get caller
     *
     * @return string
     */
    public function getCaller();

    /**
     * Set callee
     *
     * @param string $callee
     *
     * @return self
     */
    public function setCallee($callee = null);

    /**
     * Get callee
     *
     * @return string
     */
    public function getCallee();

    /**
     * Set referee
     *
     * @param string $referee
     *
     * @return self
     */
    public function setReferee($referee = null);

    /**
     * Get referee
     *
     * @return string
     */
    public function getReferee();

    /**
     * Set referrer
     *
     * @param string $referrer
     *
     * @return self
     */
    public function setReferrer($referrer = null);

    /**
     * Get referrer
     *
     * @return string
     */
    public function getReferrer();

    /**
     * Set asiden
     *
     * @param string $asiden
     *
     * @return self
     */
    public function setAsiden($asiden = null);

    /**
     * Get asiden
     *
     * @return string
     */
    public function getAsiden();

    /**
     * Set asaddress
     *
     * @param string $asaddress
     *
     * @return self
     */
    public function setAsaddress($asaddress = null);

    /**
     * Get asaddress
     *
     * @return string
     */
    public function getAsaddress();

    /**
     * Set callid
     *
     * @param string $callid
     *
     * @return self
     */
    public function setCallid($callid = null);

    /**
     * Get callid
     *
     * @return string
     */
    public function getCallid();

    /**
     * Set callidhash
     *
     * @param string $callidhash
     *
     * @return self
     */
    public function setCallidhash($callidhash = null);

    /**
     * Get callidhash
     *
     * @return string
     */
    public function getCallidhash();

    /**
     * Set xcallid
     *
     * @param string $xcallid
     *
     * @return self
     */
    public function setXcallid($xcallid = null);

    /**
     * Get xcallid
     *
     * @return string
     */
    public function getXcallid();

    /**
     * Set parsed
     *
     * @param string $parsed
     *
     * @return self
     */
    public function setParsed($parsed = null);

    /**
     * Get parsed
     *
     * @return string
     */
    public function getParsed();

    /**
     * Set diversion
     *
     * @param string $diversion
     *
     * @return self
     */
    public function setDiversion($diversion = null);

    /**
     * Get diversion
     *
     * @return string
     */
    public function getDiversion();

    /**
     * Set peeringcontractid
     *
     * @param string $peeringcontractid
     *
     * @return self
     */
    public function setPeeringcontractid($peeringcontractid = null);

    /**
     * Get peeringcontractid
     *
     * @return string
     */
    public function getPeeringcontractid();

    /**
     * Set bounced
     *
     * @param string $bounced
     *
     * @return self
     */
    public function setBounced($bounced);

    /**
     * Get bounced
     *
     * @return string
     */
    public function getBounced();

    /**
     * Set externallyrated
     *
     * @param boolean $externallyrated
     *
     * @return self
     */
    public function setExternallyrated($externallyrated = null);

    /**
     * Get externallyrated
     *
     * @return boolean
     */
    public function getExternallyrated();

    /**
     * Set metered
     *
     * @param boolean $metered
     *
     * @return self
     */
    public function setMetered($metered = null);

    /**
     * Get metered
     *
     * @return boolean
     */
    public function getMetered();

    /**
     * Set meteringdate
     *
     * @param \DateTime $meteringdate
     *
     * @return self
     */
    public function setMeteringdate($meteringdate = null);

    /**
     * Get meteringdate
     *
     * @return \DateTime
     */
    public function getMeteringdate();

    /**
     * Set pricingplanname
     *
     * @param string $pricingplanname
     *
     * @return self
     */
    public function setPricingplanname($pricingplanname = null);

    /**
     * Get pricingplanname
     *
     * @return string
     */
    public function getPricingplanname();

    /**
     * Set targetpatternname
     *
     * @param string $targetpatternname
     *
     * @return self
     */
    public function setTargetpatternname($targetpatternname = null);

    /**
     * Get targetpatternname
     *
     * @return string
     */
    public function getTargetpatternname();

    /**
     * Set price
     *
     * @param string $price
     *
     * @return self
     */
    public function setPrice($price = null);

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice();

    /**
     * Set pricingplandetails
     *
     * @param string $pricingplandetails
     *
     * @return self
     */
    public function setPricingplandetails($pricingplandetails = null);

    /**
     * Get pricingplandetails
     *
     * @return string
     */
    public function getPricingplandetails();

    /**
     * Set direction
     *
     * @param string $direction
     *
     * @return self
     */
    public function setDirection($direction = null);

    /**
     * Get direction
     *
     * @return string
     */
    public function getDirection();

    /**
     * Set remeteringdate
     *
     * @param \DateTime $remeteringdate
     *
     * @return self
     */
    public function setRemeteringdate($remeteringdate = null);

    /**
     * Get remeteringdate
     *
     * @return \DateTime
     */
    public function getRemeteringdate();

    /**
     * Set pricingPlan
     *
     * @param \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface $pricingPlan
     *
     * @return self
     */
    public function setPricingPlan(\Ivoz\Domain\Model\PricingPlan\PricingPlanInterface $pricingPlan = null);

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
    public function setTargetPattern(\Ivoz\Domain\Model\TargetPattern\TargetPatternInterface $targetPattern = null);

    /**
     * Get targetPattern
     *
     * @return \Ivoz\Domain\Model\TargetPattern\TargetPatternInterface
     */
    public function getTargetPattern();

    /**
     * Set invoice
     *
     * @param \Ivoz\Domain\Model\Invoice\InvoiceInterface $invoice
     *
     * @return self
     */
    public function setInvoice(\Ivoz\Domain\Model\Invoice\InvoiceInterface $invoice = null);

    /**
     * Get invoice
     *
     * @return \Ivoz\Domain\Model\Invoice\InvoiceInterface
     */
    public function getInvoice();

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null);

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

}

