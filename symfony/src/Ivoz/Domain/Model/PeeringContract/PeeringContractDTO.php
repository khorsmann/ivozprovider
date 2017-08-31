<?php

namespace Ivoz\Domain\Model\PeeringContract;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class PeeringContractDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $description = '';

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $externallyRated = '0';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $transformationRulesetGroupsTrunkId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $transformationRulesetGroupsTrunk;

    /**
     * @var array|null
     */
    private $outgoingRoutings = null;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'description' => $this->getDescription(),
            'name' => $this->getName(),
            'externallyRated' => $this->getExternallyRated(),
            'id' => $this->getId(),
            'brandId' => $this->getBrandId(),
            'transformationRulesetGroupsTrunkId' => $this->getTransformationRulesetGroupsTrunkId(),
            'outgoingRoutingsId' => $this->getOutgoingRoutingsId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->transformationRulesetGroupsTrunk = $transformer->transform('Ivoz\\Domain\\Model\\TransformationRulesetGroupsTrunk\\TransformationRulesetGroupsTrunk', $this->getTransformationRulesetGroupsTrunkId());
        $items = $this->getOutgoingRoutings();
        $this->outgoingRoutings = [];
        foreach ($items as $item) {
            $this->outgoingRoutings[] = $transformer->transform(
                'Ivoz\\Domain\\Model\\OutgoingRouting\\OutgoingRouting',
                $item
            );
        }

    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {
        $this->outgoingRoutings = $transformer->transform(
            'Ivoz\\Domain\\Model\\OutgoingRouting\\OutgoingRouting',
            $this->outgoingRoutings
        );
    }

    /**
     * @param string $description
     *
     * @return PeeringContractDTO
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
     * @param string $name
     *
     * @return PeeringContractDTO
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
     * @param boolean $externallyRated
     *
     * @return PeeringContractDTO
     */
    public function setExternallyRated($externallyRated = null)
    {
        $this->externallyRated = $externallyRated;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getExternallyRated()
    {
        return $this->externallyRated;
    }

    /**
     * @param integer $id
     *
     * @return PeeringContractDTO
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
     * @param integer $brandId
     *
     * @return PeeringContractDTO
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return \Ivoz\Domain\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $transformationRulesetGroupsTrunkId
     *
     * @return PeeringContractDTO
     */
    public function setTransformationRulesetGroupsTrunkId($transformationRulesetGroupsTrunkId)
    {
        $this->transformationRulesetGroupsTrunkId = $transformationRulesetGroupsTrunkId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTransformationRulesetGroupsTrunkId()
    {
        return $this->transformationRulesetGroupsTrunkId;
    }

    /**
     * @return \Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunk
     */
    public function getTransformationRulesetGroupsTrunk()
    {
        return $this->transformationRulesetGroupsTrunk;
    }

    /**
     * @param array $outgoingRoutings
     *
     * @return PeeringContractDTO
     */
    public function setOutgoingRoutings($outgoingRoutings)
    {
        $this->outgoingRoutings = $outgoingRoutings;

        return $this;
    }

    /**
     * @return array
     */
    public function getOutgoingRoutings()
    {
        return $this->outgoingRoutings;
    }
}

