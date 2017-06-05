<?php

namespace Core\Model\GenericMusicOnHold;



interface GenericMusicOnHoldInterface
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
     * Get originalFileFileSize
     *
     * @return integer
     */
    public function getOriginalFileFileSize();


    /**
     * Get originalFileMimeType
     *
     * @return string
     */
    public function getOriginalFileMimeType();


    /**
     * Get originalFileBaseName
     *
     * @return string
     */
    public function getOriginalFileBaseName();


    /**
     * Get encodedFileFileSize
     *
     * @return integer
     */
    public function getEncodedFileFileSize();


    /**
     * Get encodedFileMimeType
     *
     * @return string
     */
    public function getEncodedFileMimeType();


    /**
     * Get encodedFileBaseName
     *
     * @return string
     */
    public function getEncodedFileBaseName();


    /**
     * Get status
     *
     * @return string
     */
    public function getStatus();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand();



}

