<?php

namespace Ivoz\Domain\Model\TargetPattern;

use Core\Application\DataTransferObjectInterface;

/**
 * TargetPatternTrait
 * @codeCoverageIgnore
 */
trait TargetPatternTrait
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
     */
    protected $brand;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());

    }

    /**
     * @return TargetPatternDTO
     */
    public static function createDTO()
    {
        return new TargetPatternDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TargetPatternDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->setBrand($dto->getBrand())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TargetPatternDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return TargetPatternDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
            'id' => $this->getId(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null
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

