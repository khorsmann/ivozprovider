<?php

namespace Ivoz\Domain\Model\LcrRuleTarget;

use Core\Application\DataTransferObjectInterface;

/**
 * LcrRuleTargetTrait
 * @codeCoverageIgnore
 */
trait LcrRuleTargetTrait
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
     * @return LcrRuleTargetDTO
     */
    public static function createDTO()
    {
        return new LcrRuleTargetDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LcrRuleTargetDTO
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
         * @var $dto LcrRuleTargetDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return LcrRuleTargetDTO
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
