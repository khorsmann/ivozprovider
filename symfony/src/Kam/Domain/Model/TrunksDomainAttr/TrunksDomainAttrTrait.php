<?php

namespace Kam\Domain\Model\TrunksDomainAttr;

use Core\Application\DataTransferObjectInterface;

/**
 * TrunksDomainAttrTrait
 * @codeCoverageIgnore
 */
trait TrunksDomainAttrTrait
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
     * @return TrunksDomainAttrDTO
     */
    public static function createDTO()
    {
        return new TrunksDomainAttrDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TrunksDomainAttrDTO
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
         * @var $dto TrunksDomainAttrDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return TrunksDomainAttrDTO
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
