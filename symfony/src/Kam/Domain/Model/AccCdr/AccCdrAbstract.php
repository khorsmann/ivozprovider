<?php
namespace Kam\Domain\Model\AccCdr;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * AccCdrAbstract
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
    protected $callidhash;

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
    protected $peeringcontractid;

    /**
     * @var string
     */
    protected $bounced = 'no';

    /**
     * @var boolean
     */
    protected $externallyrated;

    /**
     * @var boolean
     */
    protected $metered = '0';

    /**
     * @var \DateTime
     */
    protected $meteringdate = '0000-00-00 00:00:00';

    /**
     * @var string
     */
    protected $pricingplanname;

    /**
     * @var string
     */
    protected $targetpatternname;

    /**
     * @var string
     */
    protected $price;

    /**
     * @var string
     */
    protected $pricingplandetails;

    /**
     * @var string
     */
    protected $direction;

    /**
     * @var \DateTime
     */
    protected $remeteringdate;

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

    public function initChangelog()
    {
        $this->_initialValues = $this->__toArray();
    }

    public function hasChanged($fieldName)
    {
        if (array_key_exists($fieldName, $this->_initialValues)) {
            throw new \Exception($fieldName . ' field was not found');
        }
        $getter = 'get' . ucfisrt($fieldName);

        return $this->$getter() != $this->_initialValues[$fieldName];
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
            ->setCallidhash($dto->getCallidhash())
            ->setXcallid($dto->getXcallid())
            ->setParsed($dto->getParsed())
            ->setDiversion($dto->getDiversion())
            ->setPeeringcontractid($dto->getPeeringcontractid())
            ->setExternallyrated($dto->getExternallyrated())
            ->setMetered($dto->getMetered())
            ->setMeteringdate($dto->getMeteringdate())
            ->setPricingplanname($dto->getPricingplanname())
            ->setTargetpatternname($dto->getTargetpatternname())
            ->setPrice($dto->getPrice())
            ->setPricingplandetails($dto->getPricingplandetails())
            ->setDirection($dto->getDirection())
            ->setRemeteringdate($dto->getRemeteringdate())
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
            ->setCallidhash($dto->getCallidhash())
            ->setXcallid($dto->getXcallid())
            ->setParsed($dto->getParsed())
            ->setDiversion($dto->getDiversion())
            ->setPeeringcontractid($dto->getPeeringcontractid())
            ->setBounced($dto->getBounced())
            ->setExternallyrated($dto->getExternallyrated())
            ->setMetered($dto->getMetered())
            ->setMeteringdate($dto->getMeteringdate())
            ->setPricingplanname($dto->getPricingplanname())
            ->setTargetpatternname($dto->getTargetpatternname())
            ->setPrice($dto->getPrice())
            ->setPricingplandetails($dto->getPricingplandetails())
            ->setDirection($dto->getDirection())
            ->setRemeteringdate($dto->getRemeteringdate())
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
            ->setCallidhash($this->getCallidhash())
            ->setXcallid($this->getXcallid())
            ->setParsed($this->getParsed())
            ->setDiversion($this->getDiversion())
            ->setPeeringcontractid($this->getPeeringcontractid())
            ->setBounced($this->getBounced())
            ->setExternallyrated($this->getExternallyrated())
            ->setMetered($this->getMetered())
            ->setMeteringdate($this->getMeteringdate())
            ->setPricingplanname($this->getPricingplanname())
            ->setTargetpatternname($this->getTargetpatternname())
            ->setPrice($this->getPrice())
            ->setPricingplandetails($this->getPricingplandetails())
            ->setDirection($this->getDirection())
            ->setRemeteringdate($this->getRemeteringdate())
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
     * Set callidhash
     *
     * @param string $callidhash
     *
     * @return self
     */
    public function setCallidhash($callidhash = null)
    {
        if (!is_null($callidhash)) {
            Assertion::maxLength($callidhash, 128);
        }

        $this->callidhash = $callidhash;

        return $this;
    }

    /**
     * Get callidhash
     *
     * @return string
     */
    public function getCallidhash()
    {
        return $this->callidhash;
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
     * Set peeringcontractid
     *
     * @param string $peeringcontractid
     *
     * @return self
     */
    public function setPeeringcontractid($peeringcontractid = null)
    {
        if (!is_null($peeringcontractid)) {
            Assertion::maxLength($peeringcontractid, 64);
        }

        $this->peeringcontractid = $peeringcontractid;

        return $this;
    }

    /**
     * Get peeringcontractid
     *
     * @return string
     */
    public function getPeeringcontractid()
    {
        return $this->peeringcontractid;
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
     * Set externallyrated
     *
     * @param boolean $externallyrated
     *
     * @return self
     */
    public function setExternallyrated($externallyrated = null)
    {
        if (!is_null($externallyrated)) {
            Assertion::between(intval($externallyrated), 0, 1);
        }

        $this->externallyrated = $externallyrated;

        return $this;
    }

    /**
     * Get externallyrated
     *
     * @return boolean
     */
    public function getExternallyrated()
    {
        return $this->externallyrated;
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
     * Set meteringdate
     *
     * @param \DateTime $meteringdate
     *
     * @return self
     */
    public function setMeteringdate($meteringdate = null)
    {
        if (!is_null($meteringdate)) {
        }

        $this->meteringdate = $meteringdate;

        return $this;
    }

    /**
     * Get meteringdate
     *
     * @return \DateTime
     */
    public function getMeteringdate()
    {
        return $this->meteringdate;
    }

    /**
     * Set pricingplanname
     *
     * @param string $pricingplanname
     *
     * @return self
     */
    public function setPricingplanname($pricingplanname = null)
    {
        if (!is_null($pricingplanname)) {
            Assertion::maxLength($pricingplanname, 55);
        }

        $this->pricingplanname = $pricingplanname;

        return $this;
    }

    /**
     * Get pricingplanname
     *
     * @return string
     */
    public function getPricingplanname()
    {
        return $this->pricingplanname;
    }

    /**
     * Set targetpatternname
     *
     * @param string $targetpatternname
     *
     * @return self
     */
    public function setTargetpatternname($targetpatternname = null)
    {
        if (!is_null($targetpatternname)) {
            Assertion::maxLength($targetpatternname, 55);
        }

        $this->targetpatternname = $targetpatternname;

        return $this;
    }

    /**
     * Get targetpatternname
     *
     * @return string
     */
    public function getTargetpatternname()
    {
        return $this->targetpatternname;
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
     * Set pricingplandetails
     *
     * @param string $pricingplandetails
     *
     * @return self
     */
    public function setPricingplandetails($pricingplandetails = null)
    {
        if (!is_null($pricingplandetails)) {
            Assertion::maxLength($pricingplandetails, 65535);
        }

        $this->pricingplandetails = $pricingplandetails;

        return $this;
    }

    /**
     * Get pricingplandetails
     *
     * @return string
     */
    public function getPricingplandetails()
    {
        return $this->pricingplandetails;
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
     * Set remeteringdate
     *
     * @param \DateTime $remeteringdate
     *
     * @return self
     */
    public function setRemeteringdate($remeteringdate = null)
    {
        if (!is_null($remeteringdate)) {
        }

        $this->remeteringdate = $remeteringdate;

        return $this;
    }

    /**
     * Get remeteringdate
     *
     * @return \DateTime
     */
    public function getRemeteringdate()
    {
        return $this->remeteringdate;
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
