<?php

namespace Kam\Domain\Model\AccCdr;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class AccCdrDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $proxy;

    /**
     * @var \DateTime
     */
    private $startTimeUtc = '2000-01-01 00:00:00';

    /**
     * @var \DateTime
     */
    private $endTimeUtc = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $startTime = '2000-01-01 00:00:00';

    /**
     * @var \DateTime
     */
    private $endTime = '2000-01-01 00:00:00';

    /**
     * @var float
     */
    private $duration = '0.000';

    /**
     * @var string
     */
    private $caller;

    /**
     * @var string
     */
    private $callee;

    /**
     * @var string
     */
    private $referee;

    /**
     * @var string
     */
    private $referrer;

    /**
     * @var string
     */
    private $asiden;

    /**
     * @var string
     */
    private $asaddress;

    /**
     * @var string
     */
    private $callid;

    /**
     * @var string
     */
    private $callidhash;

    /**
     * @var string
     */
    private $xcallid;

    /**
     * @var string
     */
    private $parsed = 'no';

    /**
     * @var string
     */
    private $diversion;

    /**
     * @var string
     */
    private $peeringcontractid;

    /**
     * @var string
     */
    private $bounced = 'no';

    /**
     * @var boolean
     */
    private $externallyrated;

    /**
     * @var boolean
     */
    private $metered = '0';

    /**
     * @var \DateTime
     */
    private $meteringdate = '0000-00-00 00:00:00';

    /**
     * @var string
     */
    private $pricingplanname;

    /**
     * @var string
     */
    private $targetpatternname;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $pricingplandetails;

    /**
     * @var string
     */
    private $direction;

    /**
     * @var \DateTime
     */
    private $remeteringdate;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $pricingPlanId;

    /**
     * @var mixed
     */
    private $targetPatternId;

    /**
     * @var mixed
     */
    private $invoiceId;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $pricingPlan;

    /**
     * @var mixed
     */
    private $targetPattern;

    /**
     * @var mixed
     */
    private $invoice;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'proxy' => $this->getProxy(),
            'startTimeUtc' => $this->getStartTimeUtc(),
            'endTimeUtc' => $this->getEndTimeUtc(),
            'startTime' => $this->getStartTime(),
            'endTime' => $this->getEndTime(),
            'duration' => $this->getDuration(),
            'caller' => $this->getCaller(),
            'callee' => $this->getCallee(),
            'referee' => $this->getReferee(),
            'referrer' => $this->getReferrer(),
            'asiden' => $this->getAsiden(),
            'asaddress' => $this->getAsaddress(),
            'callid' => $this->getCallid(),
            'callidhash' => $this->getCallidhash(),
            'xcallid' => $this->getXcallid(),
            'parsed' => $this->getParsed(),
            'diversion' => $this->getDiversion(),
            'peeringcontractid' => $this->getPeeringcontractid(),
            'bounced' => $this->getBounced(),
            'externallyrated' => $this->getExternallyrated(),
            'metered' => $this->getMetered(),
            'meteringdate' => $this->getMeteringdate(),
            'pricingplanname' => $this->getPricingplanname(),
            'targetpatternname' => $this->getTargetpatternname(),
            'price' => $this->getPrice(),
            'pricingplandetails' => $this->getPricingplandetails(),
            'direction' => $this->getDirection(),
            'remeteringdate' => $this->getRemeteringdate(),
            'id' => $this->getId(),
            'pricingPlanId' => $this->getPricingPlanId(),
            'targetPatternId' => $this->getTargetPatternId(),
            'invoiceId' => $this->getInvoiceId(),
            'brandId' => $this->getBrandId(),
            'companyId' => $this->getCompanyId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->pricingPlan = $transformer->transform('Ivoz\\Domain\\Model\\PricingPlan\\PricingPlan', $this->getPricingPlanId());
        $this->targetPattern = $transformer->transform('Ivoz\\Domain\\Model\\TargetPattern\\TargetPattern', $this->getTargetPatternId());
        $this->invoice = $transformer->transform('Ivoz\\Domain\\Model\\Invoice\\Invoice', $this->getInvoiceId());
        $this->brand = $transformer->transform('Ivoz\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->company = $transformer->transform('Ivoz\\Domain\\Model\\Company\\Company', $this->getCompanyId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $proxy
     *
     * @return AccCdrDTO
     */
    public function setProxy($proxy = null)
    {
        $this->proxy = $proxy;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * @param \DateTime $startTimeUtc
     *
     * @return AccCdrDTO
     */
    public function setStartTimeUtc($startTimeUtc)
    {
        $this->startTimeUtc = $startTimeUtc;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartTimeUtc()
    {
        return $this->startTimeUtc;
    }

    /**
     * @param \DateTime $endTimeUtc
     *
     * @return AccCdrDTO
     */
    public function setEndTimeUtc($endTimeUtc)
    {
        $this->endTimeUtc = $endTimeUtc;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndTimeUtc()
    {
        return $this->endTimeUtc;
    }

    /**
     * @param \DateTime $startTime
     *
     * @return AccCdrDTO
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param \DateTime $endTime
     *
     * @return AccCdrDTO
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param float $duration
     *
     * @return AccCdrDTO
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $caller
     *
     * @return AccCdrDTO
     */
    public function setCaller($caller = null)
    {
        $this->caller = $caller;

        return $this;
    }

    /**
     * @return string
     */
    public function getCaller()
    {
        return $this->caller;
    }

    /**
     * @param string $callee
     *
     * @return AccCdrDTO
     */
    public function setCallee($callee = null)
    {
        $this->callee = $callee;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallee()
    {
        return $this->callee;
    }

    /**
     * @param string $referee
     *
     * @return AccCdrDTO
     */
    public function setReferee($referee = null)
    {
        $this->referee = $referee;

        return $this;
    }

    /**
     * @return string
     */
    public function getReferee()
    {
        return $this->referee;
    }

    /**
     * @param string $referrer
     *
     * @return AccCdrDTO
     */
    public function setReferrer($referrer = null)
    {
        $this->referrer = $referrer;

        return $this;
    }

    /**
     * @return string
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * @param string $asiden
     *
     * @return AccCdrDTO
     */
    public function setAsiden($asiden = null)
    {
        $this->asiden = $asiden;

        return $this;
    }

    /**
     * @return string
     */
    public function getAsiden()
    {
        return $this->asiden;
    }

    /**
     * @param string $asaddress
     *
     * @return AccCdrDTO
     */
    public function setAsaddress($asaddress = null)
    {
        $this->asaddress = $asaddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getAsaddress()
    {
        return $this->asaddress;
    }

    /**
     * @param string $callid
     *
     * @return AccCdrDTO
     */
    public function setCallid($callid = null)
    {
        $this->callid = $callid;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * @param string $callidhash
     *
     * @return AccCdrDTO
     */
    public function setCallidhash($callidhash = null)
    {
        $this->callidhash = $callidhash;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallidhash()
    {
        return $this->callidhash;
    }

    /**
     * @param string $xcallid
     *
     * @return AccCdrDTO
     */
    public function setXcallid($xcallid = null)
    {
        $this->xcallid = $xcallid;

        return $this;
    }

    /**
     * @return string
     */
    public function getXcallid()
    {
        return $this->xcallid;
    }

    /**
     * @param string $parsed
     *
     * @return AccCdrDTO
     */
    public function setParsed($parsed = null)
    {
        $this->parsed = $parsed;

        return $this;
    }

    /**
     * @return string
     */
    public function getParsed()
    {
        return $this->parsed;
    }

    /**
     * @param string $diversion
     *
     * @return AccCdrDTO
     */
    public function setDiversion($diversion = null)
    {
        $this->diversion = $diversion;

        return $this;
    }

    /**
     * @return string
     */
    public function getDiversion()
    {
        return $this->diversion;
    }

    /**
     * @param string $peeringcontractid
     *
     * @return AccCdrDTO
     */
    public function setPeeringcontractid($peeringcontractid = null)
    {
        $this->peeringcontractid = $peeringcontractid;

        return $this;
    }

    /**
     * @return string
     */
    public function getPeeringcontractid()
    {
        return $this->peeringcontractid;
    }

    /**
     * @param string $bounced
     *
     * @return AccCdrDTO
     */
    public function setBounced($bounced)
    {
        $this->bounced = $bounced;

        return $this;
    }

    /**
     * @return string
     */
    public function getBounced()
    {
        return $this->bounced;
    }

    /**
     * @param boolean $externallyrated
     *
     * @return AccCdrDTO
     */
    public function setExternallyrated($externallyrated = null)
    {
        $this->externallyrated = $externallyrated;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getExternallyrated()
    {
        return $this->externallyrated;
    }

    /**
     * @param boolean $metered
     *
     * @return AccCdrDTO
     */
    public function setMetered($metered = null)
    {
        $this->metered = $metered;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getMetered()
    {
        return $this->metered;
    }

    /**
     * @param \DateTime $meteringdate
     *
     * @return AccCdrDTO
     */
    public function setMeteringdate($meteringdate = null)
    {
        $this->meteringdate = $meteringdate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getMeteringdate()
    {
        return $this->meteringdate;
    }

    /**
     * @param string $pricingplanname
     *
     * @return AccCdrDTO
     */
    public function setPricingplanname($pricingplanname = null)
    {
        $this->pricingplanname = $pricingplanname;

        return $this;
    }

    /**
     * @return string
     */
    public function getPricingplanname()
    {
        return $this->pricingplanname;
    }

    /**
     * @param string $targetpatternname
     *
     * @return AccCdrDTO
     */
    public function setTargetpatternname($targetpatternname = null)
    {
        $this->targetpatternname = $targetpatternname;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetpatternname()
    {
        return $this->targetpatternname;
    }

    /**
     * @param string $price
     *
     * @return AccCdrDTO
     */
    public function setPrice($price = null)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $pricingplandetails
     *
     * @return AccCdrDTO
     */
    public function setPricingplandetails($pricingplandetails = null)
    {
        $this->pricingplandetails = $pricingplandetails;

        return $this;
    }

    /**
     * @return string
     */
    public function getPricingplandetails()
    {
        return $this->pricingplandetails;
    }

    /**
     * @param string $direction
     *
     * @return AccCdrDTO
     */
    public function setDirection($direction = null)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param \DateTime $remeteringdate
     *
     * @return AccCdrDTO
     */
    public function setRemeteringdate($remeteringdate = null)
    {
        $this->remeteringdate = $remeteringdate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRemeteringdate()
    {
        return $this->remeteringdate;
    }

    /**
     * @param integer $id
     *
     * @return AccCdrDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $pricingPlanId
     *
     * @return AccCdrDTO
     */
    public function setPricingPlanId($pricingPlanId)
    {
        $this->pricingPlanId = $pricingPlanId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPricingPlanId()
    {
        return $this->pricingPlanId;
    }

    /**
     * @return \Ivoz\Domain\Model\PricingPlan\PricingPlan
     */
    public function getPricingPlan()
    {
        return $this->pricingPlan;
    }

    /**
     * @param integer $targetPatternId
     *
     * @return AccCdrDTO
     */
    public function setTargetPatternId($targetPatternId)
    {
        $this->targetPatternId = $targetPatternId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTargetPatternId()
    {
        return $this->targetPatternId;
    }

    /**
     * @return \Ivoz\Domain\Model\TargetPattern\TargetPattern
     */
    public function getTargetPattern()
    {
        return $this->targetPattern;
    }

    /**
     * @param integer $invoiceId
     *
     * @return AccCdrDTO
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @return \Ivoz\Domain\Model\Invoice\Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param integer $brandId
     *
     * @return AccCdrDTO
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return \Ivoz\Domain\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $companyId
     *
     * @return AccCdrDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Ivoz\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }
}
