<?php

namespace Core\Model\TargetPattern;



interface TargetPatternInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn();


    /**
     * Get nameEs
     *
     * @return string
     */
    public function getNameEs();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get descriptionEn
     *
     * @return string
     */
    public function getDescriptionEn();


    /**
     * Get descriptionEs
     *
     * @return string
     */
    public function getDescriptionEs();


    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();



}

