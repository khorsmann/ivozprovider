<?php

namespace Ivoz\Domain\Model\PricingPlansRelCompany;

use Core\Application\DataTransferObjectInterface;

/**
 * PricingPlansRelCompanyTrait
 * @codeCoverageIgnore
 */
trait PricingPlansRelCompanyTrait
{
    /**
     * @var integer
     */
    protected $id;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());

    }

    /**
     * @return PricingPlansRelCompanyDTO
     */
    public static function createDTO()
    {
        return new PricingPlansRelCompanyDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PricingPlansRelCompanyDTO
         */
        $self = parent::fromDTO($dto);

        return $self;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PricingPlansRelCompanyDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return PricingPlansRelCompanyDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
            'id' => $this->getId()
        ];
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


}
