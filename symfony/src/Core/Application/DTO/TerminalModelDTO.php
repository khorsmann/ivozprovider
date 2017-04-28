<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class TerminalModelDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $iden;

    /**
     * @var string
     */
    public $name = '';

    /**
     * @var string
     */
    public $description = '';

    /**
     * @var string
     */
    public $genericTemplate;

    /**
     * @var string
     */
    public $specificTemplate;

    /**
     * @var string
     */
    public $genericUrlPattern;

    /**
     * @var string
     */
    public $specificUrlPattern;

    /**
     * @var mixed
     */
    public $TerminalManufacturerId;

    /**
     * @var mixed
     */
    public $TerminalManufacturer;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'iden' => $this->getIden(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'genericTemplate' => $this->getGenericTemplate(),
            'specificTemplate' => $this->getSpecificTemplate(),
            'genericUrlPattern' => $this->getGenericUrlPattern(),
            'specificUrlPattern' => $this->getSpecificUrlPattern(),
            'terminalManufacturerId' => $this->getTerminalManufacturerId()
        ];
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setIden(isset($data['iden']) ? $data['iden'] : null)
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setDescription(isset($data['description']) ? $data['description'] : null)
            ->setGenericTemplate(isset($data['genericTemplate']) ? $data['genericTemplate'] : null)
            ->setSpecificTemplate(isset($data['specificTemplate']) ? $data['specificTemplate'] : null)
            ->setGenericUrlPattern(isset($data['genericUrlPattern']) ? $data['genericUrlPattern'] : null)
            ->setSpecificUrlPattern(isset($data['specificUrlPattern']) ? $data['specificUrlPattern'] : null)
            ->setTerminalManufacturerId(isset($data['TerminalManufacturerId']) ? $data['TerminalManufacturerId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->terminalManufacturer = $transformer->transform('Core\\Model\\TerminalManufacturer\\TerminalManufacturer', $this->getTerminalManufacturerId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return TerminalModelDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $iden
     *
     * @return TerminalModelDTO
     */
    public function setIden($iden)
    {
        $this->iden = $iden;

        return $this;
    }

    /**
     * @return string
     */
    public function getIden()
    {
        return $this->iden;
    }

    /**
     * @param string $name
     *
     * @return TerminalModelDTO
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $description
     *
     * @return TerminalModelDTO
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $genericTemplate
     *
     * @return TerminalModelDTO
     */
    public function setGenericTemplate($genericTemplate = null)
    {
        $this->genericTemplate = $genericTemplate;

        return $this;
    }

    /**
     * @return string
     */
    public function getGenericTemplate()
    {
        return $this->genericTemplate;
    }

    /**
     * @param string $specificTemplate
     *
     * @return TerminalModelDTO
     */
    public function setSpecificTemplate($specificTemplate = null)
    {
        $this->specificTemplate = $specificTemplate;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpecificTemplate()
    {
        return $this->specificTemplate;
    }

    /**
     * @param string $genericUrlPattern
     *
     * @return TerminalModelDTO
     */
    public function setGenericUrlPattern($genericUrlPattern = null)
    {
        $this->genericUrlPattern = $genericUrlPattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getGenericUrlPattern()
    {
        return $this->genericUrlPattern;
    }

    /**
     * @param string $specificUrlPattern
     *
     * @return TerminalModelDTO
     */
    public function setSpecificUrlPattern($specificUrlPattern = null)
    {
        $this->specificUrlPattern = $specificUrlPattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpecificUrlPattern()
    {
        return $this->specificUrlPattern;
    }

    /**
     * @param integer $terminalManufacturerId
     *
     * @return TerminalModelDTO
     */
    public function setTerminalManufacturerId($terminalManufacturerId)
    {
        $this->TerminalManufacturerId = $terminalManufacturerId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTerminalManufacturerId()
    {
        return $this->TerminalManufacturerId;
    }

    /**
     * @return \Core\Model\TerminalManufacturer\TerminalManufacturer
     */
    public function getTerminalManufacturer()
    {
        return $this->TerminalManufacturer;
    }
}

