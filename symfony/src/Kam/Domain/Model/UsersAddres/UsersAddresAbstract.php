<?php

namespace Kam\Domain\Model\UsersAddres;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersAddresAbstract
 */
abstract class UsersAddresAbstract
{
    /**
     * @column source_address
     * @var string
     */
    protected $sourceAddress;

    /**
     * @column ip_addr
     * @var string
     */
    protected $ipAddr;

    /**
     * @var integer
     */
    protected $mask = '32';

    /**
     * @var integer
     */
    protected $port = '0';

    /**
     * @var string
     */
    protected $tag;

    /**
     * @var string
     */
    protected $description;

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
    public function __construct($sourceAddress, $mask, $port)
    {
        $this->setSourceAddress($sourceAddress);
        $this->setMask($mask);
        $this->setPort($port);
    }

    abstract public function __wakeup();

    /**
     * @return UsersAddresDTO
     */
    public static function createDTO()
    {
        return new UsersAddresDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UsersAddresDTO
         */
        Assertion::isInstanceOf($dto, UsersAddresDTO::class);

        $self = new static(
            $dto->getSourceAddress(),
            $dto->getMask(),
            $dto->getPort());

        return $self
            ->setIpAddr($dto->getIpAddr())
            ->setTag($dto->getTag())
            ->setDescription($dto->getDescription())
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
         * @var $dto UsersAddresDTO
         */
        Assertion::isInstanceOf($dto, UsersAddresDTO::class);

        $this
            ->setSourceAddress($dto->getSourceAddress())
            ->setIpAddr($dto->getIpAddr())
            ->setMask($dto->getMask())
            ->setPort($dto->getPort())
            ->setTag($dto->getTag())
            ->setDescription($dto->getDescription())
            ->setCompany($dto->getCompany());


        return $this;
    }

    /**
     * @return UsersAddresDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setSourceAddress($this->getSourceAddress())
            ->setIpAddr($this->getIpAddr())
            ->setMask($this->getMask())
            ->setPort($this->getPort())
            ->setTag($this->getTag())
            ->setDescription($this->getDescription())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'sourceAddress' => $this->getSourceAddress(),
            'ipAddr' => $this->getIpAddr(),
            'mask' => $this->getMask(),
            'port' => $this->getPort(),
            'tag' => $this->getTag(),
            'description' => $this->getDescription(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set sourceAddress
     *
     * @param string $sourceAddress
     *
     * @return self
     */
    protected function setSourceAddress($sourceAddress)
    {
        Assertion::notNull($sourceAddress);
        Assertion::maxLength($sourceAddress, 100);

        $this->sourceAddress = $sourceAddress;

        return $this;
    }

    /**
     * Get sourceAddress
     *
     * @return string
     */
    public function getSourceAddress()
    {
        return $this->sourceAddress;
    }

    /**
     * Set ipAddr
     *
     * @param string $ipAddr
     *
     * @return self
     */
    protected function setIpAddr($ipAddr = null)
    {
        if (!is_null($ipAddr)) {
            Assertion::maxLength($ipAddr, 50);
        }

        $this->ipAddr = $ipAddr;

        return $this;
    }

    /**
     * Get ipAddr
     *
     * @return string
     */
    public function getIpAddr()
    {
        return $this->ipAddr;
    }

    /**
     * Set mask
     *
     * @param integer $mask
     *
     * @return self
     */
    protected function setMask($mask)
    {
        Assertion::notNull($mask);
        Assertion::integerish($mask);

        $this->mask = $mask;

        return $this;
    }

    /**
     * Get mask
     *
     * @return integer
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * Set port
     *
     * @param integer $port
     *
     * @return self
     */
    protected function setPort($port)
    {
        Assertion::notNull($port);
        Assertion::integerish($port);

        $this->port = $port;

        return $this;
    }

    /**
     * Get port
     *
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return self
     */
    protected function setTag($tag = null)
    {
        if (!is_null($tag)) {
            Assertion::maxLength($tag, 64);
        }

        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    protected function setDescription($description = null)
    {
        if (!is_null($description)) {
            Assertion::maxLength($description, 200);
        }

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    protected function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company)
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

