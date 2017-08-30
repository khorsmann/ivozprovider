<?php

namespace Ivoz\Domain\Model\Domain;

use Core\Domain\Model\EntityInterface;

interface DomainInterface extends EntityInterface
{
    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return self
     */
    public function setDomain($domain);

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain();

    /**
     * Set scope
     *
     * @param string $scope
     *
     * @return self
     */
    public function setScope($scope);

    /**
     * Get scope
     *
     * @return string
     */
    public function getScope();

    /**
     * Set pointsTo
     *
     * @param string $pointsTo
     *
     * @return self
     */
    public function setPointsTo($pointsTo);

    /**
     * Get pointsTo
     *
     * @return string
     */
    public function getPointsTo();

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
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company = null);

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null);

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();

}

