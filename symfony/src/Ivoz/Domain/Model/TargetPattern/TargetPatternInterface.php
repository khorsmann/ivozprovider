<?php

namespace Ivoz\Domain\Model\TargetPattern;

use Core\Domain\Model\EntityInterface;

interface TargetPatternInterface extends EntityInterface
{
    /**
     * Set regExp
     *
     * @param string $regExp
     *
     * @return self
     */
    public function setRegExp($regExp);

    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp();

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
     * Set name
     *
     * @param Name $name
     *
     * @return self
     */
    public function setName(\Ivoz\Domain\Model\TargetPattern\Name $name);

    /**
     * Get name
     *
     * @return Name
     */
    public function getName();

    /**
     * Set description
     *
     * @param Description $description
     *
     * @return self
     */
    public function setDescription(\Ivoz\Domain\Model\TargetPattern\Description $description);

    /**
     * Get description
     *
     * @return Description
     */
    public function getDescription();

}

