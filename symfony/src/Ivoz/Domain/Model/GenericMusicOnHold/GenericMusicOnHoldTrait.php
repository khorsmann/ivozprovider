<?php

namespace Ivoz\Domain\Model\GenericMusicOnHold;

use Core\Application\DataTransferObjectInterface;

/**
 * GenericMusicOnHoldTrait
 * @codeCoverageIgnore
 */
trait GenericMusicOnHoldTrait
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
     * @return GenericMusicOnHoldDTO
     */
    public static function createDTO()
    {
        return new GenericMusicOnHoldDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto GenericMusicOnHoldDTO
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
         * @var $dto GenericMusicOnHoldDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return GenericMusicOnHoldDTO
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
