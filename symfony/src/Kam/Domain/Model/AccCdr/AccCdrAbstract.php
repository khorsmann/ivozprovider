<?php

namespace Kam\Domain\Model\AccCdr;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * AccCdrAbstract
 * @codeCoverageIgnore
 */
abstract class AccCdrAbstract
{
    /**
     * @var string
     */
    protected $proxy;

    /**
     * @column start_time_utc
     * @var \DateTime
     */
    protected $startTimeUtc = '2000-01-01 00:00:00';

    /**
     * @column end_time_utc
     * @var \DateTime
     */
    protected $endTimeUtc = 'CURRENT_TIMESTAMP';

    /**
     * @column start_time
     * @var \DateTime
     */
    protected $startTime = '2000-01-01 00:00:00';

    /**
     * @column end_time
     * @var \DateTime
     */
    protected $endTime = '2000-01-01 00:00:00';

    /**
     * @var float
     */
    protected $duration = '0.000';

    /**
     * @var string
     */
    protected $caller;

    /**
     * @var string
     */
    protected $callee;

    /**
     * @var string
     */
    protected $referee;

    /**
     * @var string
     */
    protected $referrer;

    /**
     * @var string
     */
    protected $asiden;

    /**
     * @var string
     */
    protected $asaddress;

    /**
     * @var string
     */
    protected $callid;

    /**
     * @var string
     */
    protected $callidHash;

    /**
     * @var string
     */
    protected $xcallid;

    /**
     * @var string
     */
    protected $parsed = 'no';

    /**
     * @var string
     */
    protected $diversion;

    /**
     * @var string
     */
    protected $peeringContractId;

    /**
     * @var string
     */
    protected $bounced = 'no';

    /**
     * @var boolean
     */
    protected $externallyRated;

    /**
     * @var boolean
     */
    protected $metered = '0';

    /**
     * @var \DateTime
     */
    protected $meteringDate = '0000-00-00 00:00:00';

    /**
     * @var string
     */
    protected $pricingPlanName;

    /**
     * @var string
     */
    protected $targetPatternName;

    /**
     * @var string
     */
    protected $price;

    /**
     * @var string
     */
    protected $pricingPlanDetails;

    /**
     * @var string
     */
    protected $direction;

    /**
     * @var \DateTime
     */
    protected $reMeteringDate;

    /**
     * @var \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface
     */
    protected $pricingPlan;

    /**
     * @var \Ivoz\Domain\Model\TargetPattern\TargetPatternInterface
     */
    protected $targetPattern;

    /**
     * @var \Ivoz\Domain\Model\Invoice\InvoiceInterface
     */
    protected $invoice;

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
     */
    protected $company;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $startTimeUtc,
        $endTimeUtc,
        $startTime,
        $endTime,
        $duration,
        $bounced
    ) {
        $this->setStartTimeUtc($startTimeUtc);
        $this->setEndTimeUtc($endTimeUtc);
        $this->setStartTime($startTime);
        $this->setEndTime($endTime);
        $this->setDuration($duration);
        $this->setBounced($bounced);
        $this->initChangelog();
    }

    /**
     * @param string $fieldName
     * @return mixed
     * @throws \Exception
     */
    public function initChangelog()
    {
        $this->_initialValues = $this->__toArray();
    }

    /**
     * @param string $fieldName
     * @return mixed
     * @throws \Exception
     */
    public function hasChanged($fieldName)
    {
        if (array_key_exists($fieldName, $this->_initialValues)) {
            throw new \Exception($fieldName . ' field was not found');
        }
        $getter = 'get' . ucfisrt($fieldName);

        return $this->$getter() != $this->_initialValues[$fieldName];
    }

    public function getInitialValue($fieldName)
    {
        if (array_key_exists($fieldName, $this->_initialValues)) {
            throw new \Exception($fieldName . ' field was not found');
        }

        return $this->_initialValues[$fieldName];
    }

    /**
     * @return AccCdrDTO
     */
    public static function createDTO()
    {
        return new AccCdrDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto AccCdrDTO
         */
        Assertion::isInstanceOf($dto, AccCdrDTO::class);

        $self = new static(
            $dto->getStartTimeUtc(),
            $dto->getEndTimeUtc(),
            $dto->getStartTime(),
            $dto->getEndTime(),
            $dto->getDuration(),
            $dto->getBounced());

        return $self
            ->setProxy($dto->getProxy())
            ->setCaller($dto->getCaller())
            ->setCallee($dto->getCallee())
            ->setReferee($dto->getReferee())
            ->setReferrer($dto->getReferrer())
            ->setAsiden($dto->getAsiden())
            ->setAsaddress($dto->getAsaddress())
            ->setCallid($dto->getCallid())
            ->setCallidHash($dto->getCallidHash())
            ->setXcallid($dto->getXcallid())
            ->setParsed($dto->getParsed())
            ->setDiversion($dto->getDiversion())
            ->setPeeringContractId($dto->getPeeringContractId())
            ->setExternallyRated($dto->getExternallyRated())
            ->setMetered($dto->getMetered())
            ->setMeteringDate($dto->getMeteringDate())
            ->setPricingPlanName($dto->getPricingPlanName())
            ->setTargetPatternName($dto->getTargetPatternName())
            ->setPrice($dto->getPrice())
            ->setPricingPlanDetails($dto->getPricingPlanDetails())
            ->setDirection($dto->getDirection())
            ->setReMeteringDate($dto->getReMeteringDate())
            ->setPricingPlan($dto->getPricingPlan())
            ->setTargetPattern($dto->getTargetPattern())
            ->setInvoice($dto->getInvoice())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto AccCdrDTO
         */
        Assertion::isInstanceOf($dto, AccCdrDTO::class);

        $this
            ->setProxy($dto->getProxy())
            ->setStartTimeUtc($dto->getStartTimeUtc())
            ->setEndTimeUtc($dto->getEndTimeUtc())
            ->setStartTime($dto->getStartTime())
            ->setEndTime($dto->getEndTime())
            ->setDuration($dto->getDuration())
            ->setCaller($dto->getCaller())
            ->setCallee($dto->getCallee())
            ->setReferee($dto->getReferee())
            ->setReferrer($dto->getReferrer())
            ->setAsiden($dto->getAsiden())
            ->setAsaddress($dto->getAsaddress())
            ->setCallid($dto->getCallid())
            ->setCallidHash($dto->getCallidHash())
            ->setXcallid($dto->getXcallid())
            ->setParsed($dto->getParsed())
            ->setDiversion($dto->getDiversion())
            ->setPeeringContractId($dto->getPeeringContractId())
            ->setBounced($dto->getBounced())
            ->setExternallyRated($dto->getExternallyRated())
            ->setMetered($dto->getMetered())
            ->setMeteringDate($dto->getMeteringDate())
            ->setPricingPlanName($dto->getPricingPlanName())
            ->setTargetPatternName($dto->getTargetPatternName())
            ->setPrice($dto->getPrice())
            ->setPricingPlanDetails($dto->getPricingPlanDetails())
            ->setDirection($dto->getDirection())
            ->setReMeteringDate($dto->getReMeteringDate())
            ->setPricingPlan($dto->getPricingPlan())
            ->setTargetPattern($dto->getTargetPattern())
            ->setInvoice($dto->getInvoice())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany());


        return $this;
    }

    /**
     * @return AccCdrDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setProxy($this->getProxy())
            ->setStartTimeUtc($this->getStartTimeUtc())
            ->setEndTimeUtc($this->getEndTimeUtc())
            ->setStartTime($this->getStartTime())
            ->setEndTime($this->getEndTime())
            ->setDuration($this->getDuration())
            ->setCaller($this->getCaller())
            ->setCallee($this->getCallee())
            ->setReferee($this->getReferee())
            ->setReferrer($this->getReferrer())
            ->setAsiden($this->getAsiden())
            ->setAsaddress($this->getAsaddress())
            ->setCallid($this->getCallid())
            ->setCallidHash($this->getCallidHash())
            ->setXcallid($this->getXcallid())
            ->setParsed($this->getParsed())
            ->setDiversion($this->getDiversion())
            ->setPeeringContractId($this->getPeeringContractId())
            ->setBounced($this->getBounced())
            ->setExternallyRated($this->getExternallyRated())
            ->setMetered($this->getMetered())
            ->setMeteringDate($this->getMeteringDate())
            ->setPricingPlanName($this->getPricingPlanName())
            ->setTargetPatternName($this->getTargetPatternName())
            ->setPrice($this->getPrice())
            ->setPricingPlanDetails($this->getPricingPlanDetails())
            ->setDirection($this->getDirection())
            ->setReMeteringDate($this->getReMeteringDate())
            ->setPricingPlanId($this->getPricingPlan() ? $this->getPricingPlan()->getId() : null)
            ->setTargetPatternId($this->getTargetPattern() ? $this->getTargetPattern()->getId() : null)
            ->setInvoiceId($this->getInvoice() ? $this->getInvoice()->getId() : null)
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
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
            'callidHash' => $this->getCallidHash(),
            'xcallid' => $this->getXcallid(),
            'parsed' => $this->getParsed(),
            'diversion' => $this->getDiversion(),
            'peeringContractId' => $this->getPeeringContractId(),
            'bounced' => $this->getBounced(),
            'externallyRated' => $this->getExternallyRated(),
            'metered' => $this->getMetered(),
            'meteringDate' => $this->getMeteringDate(),
            'pricingPlanName' => $this->getPricingPlanName(),
            'targetPatternName' => $this->getTargetPatternName(),
            'price' => $this->getPrice(),
            'pricingPlanDetails' => $this->getPricingPlanDetails(),
            'direction' => $this->getDirection(),
            'reMeteringDate' => $this->getReMeteringDate(),
            'pricingPlanId' => $this->getPricingPlan() ? $this->getPricingPlan()->getId() : null,
            'targetPatternId' => $this->getTargetPattern() ? $this->getTargetPattern()->getId() : null,
            'invoiceId' => $this->getInvoice() ? $this->getInvoice()->getId() : null,
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set proxy
     *
     * @param string $proxy
     *
     * @return self
     */
    public function setProxy($proxy = null)
    {
        if (!is_null($proxy)) {
            Assertion::maxLength($proxy, 64);
        }

        $this->proxy = $proxy;

        return $this;
    }

    /**
     * Get proxy
     *
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * Set startTimeUtc
     *
     * @param \DateTime $startTimeUtc
     *
     * @return self
     */
    public function setStartTimeUtc($startTimeUtc)
    {
        Assertion::notNull($startTimeUtc);

        $this->startTimeUtc = $startTimeUtc;

        return $this;
    }

    /**
     * Get startTimeUtc
     *
     * @return \DateTime
     */
    public function getStartTimeUtc()
    {
        return $this->startTimeUtc;
    }

    /**
     * Set endTimeUtc
     *
     * @param \DateTime $endTimeUtc
     *
     * @return self
     */
    public function setEndTimeUtc($endTimeUtc)
    {
        Assertion::notNull($endTimeUtc);

        $this->endTimeUtc = $endTimeUtc;

        return $this;
    }

    /**
     * Get endTimeUtc
     *
     * @return \DateTime
     */
    public function getEndTimeUtc()
    {
        return $this->endTimeUtc;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return self
     */
    public function setStartTime($startTime)
    {
        Assertion::notNull($startTime);

        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     *
     * @return self
     */
    public function setEndTime($endTime)
    {
        Assertion::notNull($endTime);

        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set duration
     *
     * @param float $duration
     *
     * @return self
     */
    public function setDuration($duration)
    {
        Assertion::notNull($duration);
        Assertion::numeric($duration);

        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set caller
     *
     * @param string $caller
     *
     * @return self
     */
    public function setCaller($caller = null)
    {
        if (!is_null($caller)) {
            Assertion::maxLength($caller, 128);
        }

        $this->caller = $caller;

        return $this;
    }

    /**
     * Get caller
     *
     * @return string
     */
    public function getCaller()
    {
        return $this->caller;
    }

    /**
     * Set callee
     *
     * @param string $callee
     *
     * @return self
     */
    public function setCallee($callee = null)
    {
        if (!is_null($callee)) {
            Assertion::maxLength($callee, 128);
        }

        $this->callee = $callee;

        return $this;
    }

    /**
     * Get callee
     *
     * @return string
     */
    public function getCallee()
    {
        return $this->callee;
    }

    /**
     * Set referee
     *
     * @param string $referee
     *
     * @return self
     */
    public function setReferee($referee = null)
    {
        if (!is_null($referee)) {
            Assertion::maxLength($referee, 128);
        }

        $this->referee = $referee;

        return $this;
    }

    /**
     * Get referee
     *
     * @return string
     */
    public function getReferee()
    {
        return $this->referee;
    }

    /**
     * Set referrer
     *
     * @param string $referrer
     *
     * @return self
     */
    public function setReferrer($referrer = null)
    {
        if (!is_null($referrer)) {
            Assertion::maxLength($referrer, 128);
        }

        $this->referrer = $referrer;

        return $this;
    }

    /**
     * Get referrer
     *
     * @return string
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * Set asiden
     *
     * @param string $asiden
     *
     * @return self
     */
    public function setAsiden($asiden = null)
    {
        if (!is_null($asiden)) {
            Assertion::maxLength($asiden, 64);
        }

        $this->asiden = $asiden;

        return $this;
    }

    /**
     * Get asiden
     *
     * @return string
     */
    public function getAsiden()
    {
        return $this->asiden;
    }

    /**
     * Set asaddress
     *
     * @param string $asaddress
     *
     * @return self
     */
    public function setAsaddress($asaddress = null)
    {
        if (!is_null($asaddress)) {
            Assertion::maxLength($asaddress, 64);
        }

        $this->asaddress = $asaddress;

        return $this;
    }

    /**
     * Get asaddress
     *
     * @return string
     */
    public function getAsaddress()
    {
        return $this->asaddress;
    }

    /**
     * Set callid
     *
     * @param string $callid
     *
     * @return self
     */
    public function setCallid($callid = null)
    {
        if (!is_null($callid)) {
            Assertion::maxLength($callid, 255);
        }

        $this->callid = $callid;

        return $this;
    }

    /**
     * Get callid
     *
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * Set callidHash
     *
     * @param string $callidHash
     *
     * @return self
     */
    public function setCallidHash($callidHash = null)
    {
        if (!is_null($callidHash)) {
            Assertion::maxLength($callidHash, 128);
        }

        $this->callidHash = $callidHash;

        return $this;
    }

    /**
     * Get callidHash
     *
     * @return string
     */
    public function getCallidHash()
    {
        return $this->callidHash;
    }

    /**
     * Set xcallid
     *
     * @param string $xcallid
     *
     * @return self
     */
    public function setXcallid($xcallid = null)
    {
        if (!is_null($xcallid)) {
            Assertion::maxLength($xcallid, 255);
        }

        $this->xcallid = $xcallid;

        return $this;
    }

    /**
     * Get xcallid
     *
     * @return string
     */
    public function getXcallid()
    {
        return $this->xcallid;
    }

    /**
     * Set parsed
     *
     * @param string $parsed
     *
     * @return self
     */
    public function setParsed($parsed = null)
    {
        if (!is_null($parsed)) {
        }

        $this->parsed = $parsed;

        return $this;
    }

    /**
     * Get parsed
     *
     * @return string
     */
    public function getParsed()
    {
        return $this->parsed;
    }

    /**
     * Set diversion
     *
     * @param string $diversion
     *
     * @return self
     */
    public function setDiversion($diversion = null)
    {
        if (!is_null($diversion)) {
            Assertion::maxLength($diversion, 64);
        }

        $this->diversion = $diversion;

        return $this;
    }

    /**
     * Get diversion
     *
     * @return string
     */
    public function getDiversion()
    {
        return $this->diversion;
    }

    /**
     * Set peeringContractId
     *
     * @param string $peeringContractId
     *
     * @return self
     */
    public function setPeeringContractId($peeringContractId = null)
    {
        if (!is_null($peeringContractId)) {
            Assertion::maxLength($peeringContractId, 64);
        }

        $this->peeringContractId = $peeringContractId;

        return $this;
    }

    /**
     * Get peeringContractId
     *
     * @return string
     */
    public function getPeeringContractId()
    {
        return $this->peeringContractId;
    }

    /**
     * Set bounced
     *
     * @param string $bounced
     *
     * @return self
     */
    public function setBounced($bounced)
    {
        Assertion::notNull($bounced);

        $this->bounced = $bounced;

        return $this;
    }

    /**
     * Get bounced
     *
     * @return string
     */
    public function getBounced()
    {
        return $this->bounced;
    }

    /**
     * Set externallyRated
     *
     * @param boolean $externallyRated
     *
     * @return self
     */
    public function setExternallyRated($externallyRated = null)
    {
        if (!is_null($externallyRated)) {
            Assertion::between(intval($externallyRated), 0, 1);
        }

        $this->externallyRated = $externallyRated;

        return $this;
    }

    /**
     * Get externallyRated
     *
     * @return boolean
     */
    public function getExternallyRated()
    {
        return $this->externallyRated;
    }

    /**
     * Set metered
     *
     * @param boolean $metered
     *
     * @return self
     */
    public function setMetered($metered = null)
    {
        if (!is_null($metered)) {
            Assertion::between(intval($metered), 0, 1);
        }

        $this->metered = $metered;

        return $this;
    }

    /**
     * Get metered
     *
     * @return boolean
     */
    public function getMetered()
    {
        return $this->metered;
    }

    /**
     * Set meteringDate
     *
     * @param \DateTime $meteringDate
     *
     * @return self
     */
    public function setMeteringDate($meteringDate = null)
    {
        if (!is_null($meteringDate)) {
        }

        $this->meteringDate = $meteringDate;

        return $this;
    }

    /**
     * Get meteringDate
     *
     * @return \DateTime
     */
    public function getMeteringDate()
    {
        return $this->meteringDate;
    }

    /**
     * Set pricingPlanName
     *
     * @param string $pricingPlanName
     *
     * @return self
     */
    public function setPricingPlanName($pricingPlanName = null)
    {
        if (!is_null($pricingPlanName)) {
            Assertion::maxLength($pricingPlanName, 55);
        }

        $this->pricingPlanName = $pricingPlanName;

        return $this;
    }

    /**
     * Get pricingPlanName
     *
     * @return string
     */
    public function getPricingPlanName()
    {
        return $this->pricingPlanName;
    }

    /**
     * Set targetPatternName
     *
     * @param string $targetPatternName
     *
     * @return self
     */
    public function setTargetPatternName($targetPatternName = null)
    {
        if (!is_null($targetPatternName)) {
            Assertion::maxLength($targetPatternName, 55);
        }

        $this->targetPatternName = $targetPatternName;

        return $this;
    }

    /**
     * Get targetPatternName
     *
     * @return string
     */
    public function getTargetPatternName()
    {
        return $this->targetPatternName;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return self
     */
    public function setPrice($price = null)
    {
        if (!is_null($price)) {
            if (!is_null($price)) {
                Assertion::numeric($price);
            }
        }

        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set pricingPlanDetails
     *
     * @param string $pricingPlanDetails
     *
     * @return self
     */
    public function setPricingPlanDetails($pricingPlanDetails = null)
    {
        if (!is_null($pricingPlanDetails)) {
            Assertion::maxLength($pricingPlanDetails, 65535);
        }

        $this->pricingPlanDetails = $pricingPlanDetails;

        return $this;
    }

    /**
     * Get pricingPlanDetails
     *
     * @return string
     */
    public function getPricingPlanDetails()
    {
        return $this->pricingPlanDetails;
    }

    /**
     * Set direction
     *
     * @param string $direction
     *
     * @return self
     */
    public function setDirection($direction = null)
    {
        if (!is_null($direction)) {
        }

        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Set reMeteringDate
     *
     * @param \DateTime $reMeteringDate
     *
     * @return self
     */
    public function setReMeteringDate($reMeteringDate = null)
    {
        if (!is_null($reMeteringDate)) {
        }

        $this->reMeteringDate = $reMeteringDate;

        return $this;
    }

    /**
     * Get reMeteringDate
     *
     * @return \DateTime
     */
    public function getReMeteringDate()
    {
        return $this->reMeteringDate;
    }

    /**
     * Set pricingPlan
     *
     * @param \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface $pricingPlan
     *
     * @return self
     */
    public function setPricingPlan(\Ivoz\Domain\Model\PricingPlan\PricingPlanInterface $pricingPlan = null)
    {
        $this->pricingPlan = $pricingPlan;

        return $this;
    }

    /**
     * Get pricingPlan
     *
     * @return \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan()
    {
        return $this->pricingPlan;
    }

    /**
     * Set targetPattern
     *
     * @param \Ivoz\Domain\Model\TargetPattern\TargetPatternInterface $targetPattern
     *
     * @return self
     */
    public function setTargetPattern(\Ivoz\Domain\Model\TargetPattern\TargetPatternInterface $targetPattern = null)
    {
        $this->targetPattern = $targetPattern;

        return $this;
    }

    /**
     * Get targetPattern
     *
     * @return \Ivoz\Domain\Model\TargetPattern\TargetPatternInterface
     */
    public function getTargetPattern()
    {
        return $this->targetPattern;
    }

    /**
     * Set invoice
     *
     * @param \Ivoz\Domain\Model\Invoice\InvoiceInterface $invoice
     *
     * @return self
     */
    public function setInvoice(\Ivoz\Domain\Model\Invoice\InvoiceInterface $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \Ivoz\Domain\Model\Invoice\InvoiceInterface
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }



    // @codeCoverageIgnoreEnd
}

