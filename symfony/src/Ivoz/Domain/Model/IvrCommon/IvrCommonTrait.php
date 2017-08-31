<?php

namespace Ivoz\Domain\Model\IvrCommon;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * IvrCommonTrait
 * @codeCoverageIgnore
 */
trait IvrCommonTrait
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $extensions;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());
        $this->extensions = new ArrayCollection();
    }

    /**
     * @return IvrCommonDTO
     */
    public static function createDTO()
    {
        return new IvrCommonDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto IvrCommonDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replaceExtensions($dto->getExtensions())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto IvrCommonDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replaceExtensions($dto->getExtensions());


        return $this;
    }

    /**
     * @return IvrCommonDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setExtensions($this->getExtensions());
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

    /**
     * Add extension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $extension
     *
     * @return IvrCommonTrait
     */
    public function addExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $extension)
    {
        $this->extensions[] = $extension;

        return $this;
    }

    /**
     * Remove extension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $extension
     */
    public function removeExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $extension)
    {
        $this->extensions->removeElement($extension);
    }

    /**
     * Replace extensions
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface[] $extensions
     * @return self
     */
    public function replaceExtensions(array $extensions)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($extensions as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setIvrCommon($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->extensions as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->extensions[$key] = $updatedEntities[$identity];
            } else {
                $this->removeExtension($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addExtension($entity);
        }

        return $this;
    }

    /**
     * Get extensions
     *
     * @return array
     */
    public function getExtensions(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->extensions->matching($criteria)->toArray();
        }

        return $this->extensions->toArray();
    }


}

