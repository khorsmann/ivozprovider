<?php

namespace Ivoz\Domain\Model\Locution;

use Core\Domain\Model\EntityInterface;

interface LocutionInterface extends EntityInterface
{
    public function getLocutionPath();

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
     * Set status
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status = null);

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus();

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company);

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();

    /**
     * Set encodedFile
     *
     * @param EncodedFile $encodedFile
     *
     * @return self
     */
    public function setEncodedFile(\Ivoz\Domain\Model\Locution\EncodedFile $encodedFile);

    /**
     * Get encodedFile
     *
     * @return EncodedFile
     */
    public function getEncodedFile();

    /**
     * Set originalFile
     *
     * @param OriginalFile $originalFile
     *
     * @return self
     */
    public function setOriginalFile(\Ivoz\Domain\Model\Locution\OriginalFile $originalFile);

    /**
     * Get originalFile
     *
     * @return OriginalFile
     */
    public function getOriginalFile();

}

