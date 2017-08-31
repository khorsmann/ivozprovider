<?php

namespace Ivoz\Domain\Model\FeaturesRelCompany;

use Core\Domain\Model\EntityInterface;

interface FeaturesRelCompanyInterface extends EntityInterface
{
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
     * Set feature
     *
     * @param \Ivoz\Domain\Model\Feature\FeatureInterface $feature
     *
     * @return self
     */
    public function setFeature(\Ivoz\Domain\Model\Feature\FeatureInterface $feature);

    /**
     * Get feature
     *
     * @return \Ivoz\Domain\Model\Feature\FeatureInterface
     */
    public function getFeature();

}

