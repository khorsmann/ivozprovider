<?php

namespace Ivoz\Domain\Model\RetailAccount;

use Core\Domain\Model\EntityInterface;

interface RetailAccountInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getContact();

    /**
     * @return string
     */
    public function getSorcery();

    /**
     * @brief Return Retail Account country or company if null
     * @return CountryInterface
     */
    public function getCountry();

    /**
     * @deprecated use getCountry instead
     */
    public function getCountries();

    /**
     * Convert a user dialed number to E164 form
     *
     * @param string $number
     * @return string number in E164
     */
    public function preferredToE164($prefnumber);

    /**
     * Convert a received number to User prefered format
     *
     * @param number $number
     */
    public function E164ToPreferred($e164number);

    /**
     * Obtain content for X-Info-Retail header
     *
     * @param mixed $callee
     * @return string
     */
    public function getRequestUri($callee);

    /**
     * @param $callee
     * @return string
     */
    public function getRequestDirectUri($callee);

    public function getAstPsEndpoint();

    public function getLanguageCode();

    /**
     * Get Retail Account outgoingDDI
     * If no DDI is assigned, retrieve company's default DDI
     * @return \IvozProvider\Model\Raw\DDIs or NULL
     */
    public function getOutgoingDDI();

    /**
     * Get DDI associated with this retail Account
     *
     * @return DDIInterface
     */
    public function getDDI($ddieE164);

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
     * Set domain
     *
     * @param string $domain
     *
     * @return self
     */
    public function setDomain($domain = null);

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain();

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
     * Set transport
     *
     * @param string $transport
     *
     * @return self
     */
    public function setTransport($transport);

    /**
     * Get transport
     *
     * @return string
     */
    public function getTransport();

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return self
     */
    public function setIp($ip = null);

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp();

    /**
     * Set port
     *
     * @param integer $port
     *
     * @return self
     */
    public function setPort($port = null);

    /**
     * Get port
     *
     * @return integer
     */
    public function getPort();

    /**
     * Set authNeeded
     *
     * @param string $authNeeded
     *
     * @return self
     */
    public function setAuthNeeded($authNeeded);

    /**
     * Get authNeeded
     *
     * @return string
     */
    public function getAuthNeeded();

    /**
     * Set password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword($password = null);

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword();

    /**
     * Set areaCode
     *
     * @param string $areaCode
     *
     * @return self
     */
    public function setAreaCode($areaCode = null);

    /**
     * Get areaCode
     *
     * @return string
     */
    public function getAreaCode();

    /**
     * Set disallow
     *
     * @param string $disallow
     *
     * @return self
     */
    public function setDisallow($disallow);

    /**
     * Get disallow
     *
     * @return string
     */
    public function getDisallow();

    /**
     * Set allow
     *
     * @param string $allow
     *
     * @return self
     */
    public function setAllow($allow);

    /**
     * Get allow
     *
     * @return string
     */
    public function getAllow();

    /**
     * Set directMediaMethod
     *
     * @param string $directMediaMethod
     *
     * @return self
     */
    public function setDirectMediaMethod($directMediaMethod);

    /**
     * Get directMediaMethod
     *
     * @return string
     */
    public function getDirectMediaMethod();

    /**
     * Set calleridUpdateHeader
     *
     * @param string $calleridUpdateHeader
     *
     * @return self
     */
    public function setCalleridUpdateHeader($calleridUpdateHeader);

    /**
     * Get calleridUpdateHeader
     *
     * @return string
     */
    public function getCalleridUpdateHeader();

    /**
     * Set updateCallerid
     *
     * @param string $updateCallerid
     *
     * @return self
     */
    public function setUpdateCallerid($updateCallerid);

    /**
     * Get updateCallerid
     *
     * @return string
     */
    public function getUpdateCallerid();

    /**
     * Set fromDomain
     *
     * @param string $fromDomain
     *
     * @return self
     */
    public function setFromDomain($fromDomain = null);

    /**
     * Get fromDomain
     *
     * @return string
     */
    public function getFromDomain();

    /**
     * Set directConnectivity
     *
     * @param string $directConnectivity
     *
     * @return self
     */
    public function setDirectConnectivity($directConnectivity);

    /**
     * Get directConnectivity
     *
     * @return string
     */
    public function getDirectConnectivity();

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
     * Set country
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $country
     *
     * @return self
     */
    public function setCountry(\Ivoz\Domain\Model\Country\CountryInterface $country = null);

    /**
     * Set outgoingDDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $outgoingDDI
     *
     * @return self
     */
    public function setOutgoingDDI(\Ivoz\Domain\Model\DDI\DDIInterface $outgoingDDI = null);

    /**
     * Set language
     *
     * @param \Ivoz\Domain\Model\Language\LanguageInterface $language
     *
     * @return self
     */
    public function setLanguage(\Ivoz\Domain\Model\Language\LanguageInterface $language = null);

    /**
     * Get language
     *
     * @return \Ivoz\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage();

    /**
     * Add psEndpoint
     *
     * @param \Ast\Domain\Model\PsEndpoint\PsEndpointInterface $psEndpoint
     *
     * @return RetailAccountTrait
     */
    public function addPsEndpoint(\Ast\Domain\Model\PsEndpoint\PsEndpointInterface $psEndpoint);

    /**
     * Remove psEndpoint
     *
     * @param \Ast\Domain\Model\PsEndpoint\PsEndpointInterface $psEndpoint
     */
    public function removePsEndpoint(\Ast\Domain\Model\PsEndpoint\PsEndpointInterface $psEndpoint);

    /**
     * Replace psEndpoints
     *
     * @param \Ast\Domain\Model\PsEndpoint\PsEndpointInterface[] $psEndpoints
     * @return self
     */
    public function replacePsEndpoints(array $psEndpoints);

    /**
     * Get psEndpoints
     *
     * @return array
     */
    public function getPsEndpoints(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add dDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $dDI
     *
     * @return RetailAccountTrait
     */
    public function addDDI(\Ivoz\Domain\Model\DDI\DDIInterface $dDI);

    /**
     * Remove dDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $dDI
     */
    public function removeDDI(\Ivoz\Domain\Model\DDI\DDIInterface $dDI);

    /**
     * Replace dDIs
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface[] $dDIs
     * @return self
     */
    public function replaceDDIs(array $dDIs);

    /**
     * Get dDIs
     *
     * @return array
     */
    public function getDDIs(\Doctrine\Common\Collections\Criteria $criteria = null);

}

