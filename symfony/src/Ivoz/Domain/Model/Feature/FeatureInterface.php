<?php

namespace Ivoz\Domain\Model\Feature;

use Core\Domain\Model\EntityInterface;

interface FeatureInterface extends EntityInterface
{
    /**
     * Set iden
     *
     * @param string $iden
     *
     * @return self
     */
    public function setIden($iden);

    /**
     * Get iden
     *
     * @return string
     */
    public function getIden();

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
     * Set nameEn
     *
     * @param string $nameEn
     *
     * @return self
     */
    public function setNameEn($nameEn);

    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn();

    /**
     * Set nameEs
     *
     * @param string $nameEs
     *
     * @return self
     */
    public function setNameEs($nameEs);

    /**
     * Get nameEs
     *
     * @return string
     */
    public function getNameEs();

}

