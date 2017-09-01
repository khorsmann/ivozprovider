<?php

namespace Ivoz\Domain\Model\RoutingPatternGroup;

use Core\Domain\Model\EntityInterface;

interface RoutingPatternGroupInterface extends EntityInterface
{
    /**
     * @return \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface[]
     */
    public function getRoutingPatterns();

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
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

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
     * Add relPattern
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern
     *
     * @return RoutingPatternGroupTrait
     */
    public function addRelPattern(\Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern);

    /**
     * Remove relPattern
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern
     */
    public function removeRelPattern(\Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern);

    /**
     * Replace relPatterns
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface[] $relPatterns
     * @return self
     */
    public function replaceRelPatterns(array $relPatterns);

    /**
     * Get relPatterns
     *
     * @return array
     */
    public function getRelPatterns(\Doctrine\Common\Collections\Criteria $criteria = null);

}

