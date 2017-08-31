<?php

namespace Ivoz\Domain\Model\PeeringContract;

use Core\Domain\Model\EntityInterface;

interface PeeringContractInterface extends EntityInterface
{
    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set externallyRated
     *
     * @param boolean $externallyRated
     *
     * @return self
     */
    public function setExternallyRated($externallyRated = null);

    /**
     * Get externallyRated
     *
     * @return boolean
     */
    public function getExternallyRated();

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand);

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();

    /**
     * Set transformationRulesetGroupsTrunk
     *
     * @param \Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface $transformationRulesetGroupsTrunk
     *
     * @return self
     */
    public function setTransformationRulesetGroupsTrunk(\Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface $transformationRulesetGroupsTrunk = null);

    /**
     * Get transformationRulesetGroupsTrunk
     *
     * @return \Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface
     */
    public function getTransformationRulesetGroupsTrunk();

    /**
     * Add outgoingRouting
     *
     * @param \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     *
     * @return PeeringContractTrait
     */
    public function addOutgoingRouting(\Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting);

    /**
     * Remove outgoingRouting
     *
     * @param \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     */
    public function removeOutgoingRouting(\Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting);

    /**
     * Replace outgoingRoutings
     *
     * @param \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface[] $outgoingRoutings
     * @return self
     */
    public function replaceOutgoingRoutings(array $outgoingRoutings);

    /**
     * Get outgoingRoutings
     *
     * @return array
     */
    public function getOutgoingRoutings(\Doctrine\Common\Collections\Criteria $criteria = null);

}

