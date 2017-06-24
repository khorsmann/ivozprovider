<?php

namespace Core\Domain\Model\PricingPlan;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * PricingPlanAbstract
 */
abstract class PricingPlanAbstract implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @comment ml
     * @var string
     */
    protected $name;

    /**
     * @column name_en
     * @var string
     */
    protected $nameEn;

    /**
     * @column name_es
     * @var string
     */
    protected $nameEs;

    /**
     * @comment ml
     * @var string
     */
    protected $description;

    /**
     * @column description_en
     * @var string
     */
    protected $descriptionEn;

    /**
     * @column description_es
     * @var string
     */
    protected $descriptionEs;

    /**
     * @var \DateTime
     */
    protected $createdOn = 'CURRENT_TIMESTAMP';

    /**
     * @var \Core\Domain\Model\Brand\BrandInterface
     */
    protected $brand;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $name,
        $nameEn,
        $nameEs,
        $description,
        $descriptionEn,
        $descriptionEs,
        $createdOn
    ) {
        $this->setName($name);
        $this->setNameEn($nameEn);
        $this->setNameEs($nameEs);
        $this->setDescription($description);
        $this->setDescriptionEn($descriptionEn);
        $this->setDescriptionEs($descriptionEs);
        $this->setCreatedOn($createdOn);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return PricingPlanDTO
     */
    public static function createDTO()
    {
        return new PricingPlanDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PricingPlanDTO
         */
        Assertion::isInstanceOf($dto, PricingPlanDTO::class);

        $self = new static(
            $dto->getName(),
            $dto->getNameEn(),
            $dto->getNameEs(),
            $dto->getDescription(),
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs(),
            $dto->getCreatedOn()
        );

        return $self
            ->setBrand($dto->getBrand());
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PricingPlanDTO
         */
        Assertion::isInstanceOf($dto, PricingPlanDTO::class);

        $this
            ->setName($dto->getName())
            ->setNameEn($dto->getNameEn())
            ->setNameEs($dto->getNameEs())
            ->setDescription($dto->getDescription())
            ->setDescriptionEn($dto->getDescriptionEn())
            ->setDescriptionEs($dto->getDescriptionEs())
            ->setCreatedOn($dto->getCreatedOn())
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return PricingPlanDTO
     */
    public function toDTO()
    {
        return static::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setNameEn($this->getNameEn())
            ->setNameEs($this->getNameEs())
            ->setDescription($this->getDescription())
            ->setDescriptionEn($this->getDescriptionEn())
            ->setDescriptionEs($this->getDescriptionEs())
            ->setCreatedOn($this->getCreatedOn())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'nameEn' => $this->getNameEn(),
            'nameEs' => $this->getNameEs(),
            'description' => $this->getDescription(),
            'descriptionEn' => $this->getDescriptionEn(),
            'descriptionEs' => $this->getDescriptionEs(),
            'createdOn' => $this->getCreatedOn(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 55);

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nameEn
     *
     * @param string $nameEn
     *
     * @return self
     */
    protected function setNameEn($nameEn)
    {
        Assertion::notNull($nameEn);
        Assertion::maxLength($nameEn, 55);

        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * Set nameEs
     *
     * @param string $nameEs
     *
     * @return self
     */
    protected function setNameEs($nameEs)
    {
        Assertion::notNull($nameEs);
        Assertion::maxLength($nameEs, 55);

        $this->nameEs = $nameEs;

        return $this;
    }

    /**
     * Get nameEs
     *
     * @return string
     */
    public function getNameEs()
    {
        return $this->nameEs;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    protected function setDescription($description)
    {
        Assertion::notNull($description);
        Assertion::maxLength($description, 55);

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
     * Set descriptionEn
     *
     * @param string $descriptionEn
     *
     * @return self
     */
    protected function setDescriptionEn($descriptionEn)
    {
        Assertion::notNull($descriptionEn);
        Assertion::maxLength($descriptionEn, 55);

        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    /**
     * Get descriptionEn
     *
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * Set descriptionEs
     *
     * @param string $descriptionEs
     *
     * @return self
     */
    protected function setDescriptionEs($descriptionEs)
    {
        Assertion::notNull($descriptionEs);
        Assertion::maxLength($descriptionEs, 55);

        $this->descriptionEs = $descriptionEs;

        return $this;
    }

    /**
     * Get descriptionEs
     *
     * @return string
     */
    public function getDescriptionEs()
    {
        return $this->descriptionEs;
    }

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     * @return self
     */
    protected function setCreatedOn($createdOn)
    {
        Assertion::notNull($createdOn);

        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }



    // @codeCoverageIgnoreEnd
}

