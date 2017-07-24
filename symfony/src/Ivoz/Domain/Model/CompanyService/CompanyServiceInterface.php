<?php

namespace Ivoz\Domain\Model\CompanyService;

use Core\Domain\Model\EntityInterface;

interface CompanyServiceInterface extends EntityInterface
{
    /**
     * Get code
     *
     * @return string
     */
    public function getCode();


    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get service
     *
     * @return \Ivoz\Domain\Model\Service\ServiceInterface
     */
    public function getService();



}

