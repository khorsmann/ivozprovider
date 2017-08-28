<?php

namespace Ivoz\Domain\Model\Brand;

use Core\Domain\Model\EntityInterface;

interface BrandInterface extends EntityInterface
{
    public function getActivePricingPlans($date = null);

    public function getActivePrincingPlansIds($date = null);

    public function getLanguageCode();

    public function willUseExternallyRating(\Ivoz\Domain\Model\Company\CompanyInterface $company, $destination = null);

    /**
     * Get the size in bytes used by the recordings on this brand
     *
     */
    public function getRecordingsDiskUsage();

    /**
     * Get the size in bytes for disk usage limit on this brand
     */
    public function getRecordingsLimit();

    /**
     * @return FeatureInterface[]
     */
    public function getFeatures();

    public function hasFeature($featureId);

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
     * Set nif
     *
     * @param string $nif
     *
     * @return self
     */
    public function setNif($nif);

    /**
     * Get nif
     *
     * @return string
     */
    public function getNif();

    /**
     * Set domainUsers
     *
     * @param string $domainUsers
     *
     * @return self
     */
    public function setDomainUsers($domainUsers = null);

    /**
     * Get domainUsers
     *
     * @return string
     */
    public function getDomainUsers();

    /**
     * Set postalAddress
     *
     * @param string $postalAddress
     *
     * @return self
     */
    public function setPostalAddress($postalAddress);

    /**
     * Get postalAddress
     *
     * @return string
     */
    public function getPostalAddress();

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return self
     */
    public function setPostalCode($postalCode);

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode();

    /**
     * Set town
     *
     * @param string $town
     *
     * @return self
     */
    public function setTown($town);

    /**
     * Get town
     *
     * @return string
     */
    public function getTown();

    /**
     * Set province
     *
     * @param string $province
     *
     * @return self
     */
    public function setProvince($province);

    /**
     * Get province
     *
     * @return string
     */
    public function getProvince();

    /**
     * Set country
     *
     * @param string $country
     *
     * @return self
     */
    public function setCountry($country);

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry();

    /**
     * Set registryData
     *
     * @param string $registryData
     *
     * @return self
     */
    public function setRegistryData($registryData = null);

    /**
     * Get registryData
     *
     * @return string
     */
    public function getRegistryData();

    /**
     * Set fromName
     *
     * @param string $fromName
     *
     * @return self
     */
    public function setFromName($fromName = null);

    /**
     * Get fromName
     *
     * @return string
     */
    public function getFromName();

    /**
     * Set fromAddress
     *
     * @param string $fromAddress
     *
     * @return self
     */
    public function setFromAddress($fromAddress = null);

    /**
     * Get fromAddress
     *
     * @return string
     */
    public function getFromAddress();

    /**
     * Set recordingsLimitMB
     *
     * @param integer $recordingsLimitMB
     *
     * @return self
     */
    public function setRecordingsLimitMB($recordingsLimitMB = null);

    /**
     * Get recordingsLimitMB
     *
     * @return integer
     */
    public function getRecordingsLimitMB();

    /**
     * Set recordingslimitemail
     *
     * @param string $recordingslimitemail
     *
     * @return self
     */
    public function setRecordingslimitemail($recordingslimitemail = null);

    /**
     * Get recordingslimitemail
     *
     * @return string
     */
    public function getRecordingslimitemail();

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
     * Set defaultTimezone
     *
     * @param \Ivoz\Domain\Model\Timezone\TimezoneInterface $defaultTimezone
     *
     * @return self
     */
    public function setDefaultTimezone(\Ivoz\Domain\Model\Timezone\TimezoneInterface $defaultTimezone = null);

    /**
     * Get defaultTimezone
     *
     * @return \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    public function getDefaultTimezone();

    /**
     * Set logo
     *
     * @param Logo $logo
     *
     * @return self
     */
    public function setLogo(\Ivoz\Domain\Model\Brand\Logo $logo);

    /**
     * Get logo
     *
     * @return Logo
     */
    public function getLogo();

    /**
     * Add company
     *
     * @param \Ivoz\Domain\Model\Company\Company $company
     *
     * @return BrandTrait
     */
    public function addCompany(\Ivoz\Domain\Model\Company\Company $company);

    /**
     * Remove company
     *
     * @param \Ivoz\Domain\Model\Company\Company $company
     */
    public function removeCompany(\Ivoz\Domain\Model\Company\Company $company);

    /**
     * Replace companies
     *
     * @param \Ivoz\Domain\Model\Company\Company[] $companies
     * @return self
     */
    public function replaceCompanies(array $companies);

    /**
     * Get companies
     *
     * @return array
     */
    public function getCompanies(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add operator
     *
     * @param \Ivoz\Domain\Model\BrandOperator\BrandOperator $operator
     *
     * @return BrandTrait
     */
    public function addOperator(\Ivoz\Domain\Model\BrandOperator\BrandOperator $operator);

    /**
     * Remove operator
     *
     * @param \Ivoz\Domain\Model\BrandOperator\BrandOperator $operator
     */
    public function removeOperator(\Ivoz\Domain\Model\BrandOperator\BrandOperator $operator);

    /**
     * Replace operators
     *
     * @param \Ivoz\Domain\Model\BrandOperator\BrandOperator[] $operators
     * @return self
     */
    public function replaceOperators(array $operators);

    /**
     * Get operators
     *
     * @return array
     */
    public function getOperators(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add service
     *
     * @param \Ivoz\Domain\Model\BrandService\BrandService $service
     *
     * @return BrandTrait
     */
    public function addService(\Ivoz\Domain\Model\BrandService\BrandService $service);

    /**
     * Remove service
     *
     * @param \Ivoz\Domain\Model\BrandService\BrandService $service
     */
    public function removeService(\Ivoz\Domain\Model\BrandService\BrandService $service);

    /**
     * Replace services
     *
     * @param \Ivoz\Domain\Model\BrandService\BrandService[] $services
     * @return self
     */
    public function replaceServices(array $services);

    /**
     * Get services
     *
     * @return array
     */
    public function getServices(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add url
     *
     * @param \Ivoz\Domain\Model\BrandURL\BrandURL $url
     *
     * @return BrandTrait
     */
    public function addUrl(\Ivoz\Domain\Model\BrandURL\BrandURL $url);

    /**
     * Remove url
     *
     * @param \Ivoz\Domain\Model\BrandURL\BrandURL $url
     */
    public function removeUrl(\Ivoz\Domain\Model\BrandURL\BrandURL $url);

    /**
     * Replace urls
     *
     * @param \Ivoz\Domain\Model\BrandURL\BrandURL[] $urls
     * @return self
     */
    public function replaceUrls(array $urls);

    /**
     * Get urls
     *
     * @return array
     */
    public function getUrls(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add relFeature
     *
     * @param \Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrand $relFeature
     *
     * @return BrandTrait
     */
    public function addRelFeature(\Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrand $relFeature);

    /**
     * Remove relFeature
     *
     * @param \Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrand $relFeature
     */
    public function removeRelFeature(\Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrand $relFeature);

    /**
     * Replace relFeatures
     *
     * @param \Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrand[] $relFeatures
     * @return self
     */
    public function replaceRelFeatures(array $relFeatures);

    /**
     * Get relFeatures
     *
     * @return array
     */
    public function getRelFeatures(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add domain
     *
     * @param \Ivoz\Domain\Model\Domain\Domain $domain
     *
     * @return BrandTrait
     */
    public function addDomain(\Ivoz\Domain\Model\Domain\Domain $domain);

    /**
     * Remove domain
     *
     * @param \Ivoz\Domain\Model\Domain\Domain $domain
     */
    public function removeDomain(\Ivoz\Domain\Model\Domain\Domain $domain);

    /**
     * Replace domains
     *
     * @param \Ivoz\Domain\Model\Domain\Domain[] $domains
     * @return self
     */
    public function replaceDomains(array $domains);

    /**
     * Get domains
     *
     * @return array
     */
    public function getDomains(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add retailAccount
     *
     * @param \Ivoz\Domain\Model\RetailAccount\RetailAccount $retailAccount
     *
     * @return BrandTrait
     */
    public function addRetailAccount(\Ivoz\Domain\Model\RetailAccount\RetailAccount $retailAccount);

    /**
     * Remove retailAccount
     *
     * @param \Ivoz\Domain\Model\RetailAccount\RetailAccount $retailAccount
     */
    public function removeRetailAccount(\Ivoz\Domain\Model\RetailAccount\RetailAccount $retailAccount);

    /**
     * Replace retailAccounts
     *
     * @param \Ivoz\Domain\Model\RetailAccount\RetailAccount[] $retailAccounts
     * @return self
     */
    public function replaceRetailAccounts(array $retailAccounts);

    /**
     * Get retailAccounts
     *
     * @return array
     */
    public function getRetailAccounts(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add genericMusicsOnHold
     *
     * @param \Ivoz\Domain\Model\GenericMusicOnHold\GenericMusicOnHold $genericMusicsOnHold
     *
     * @return BrandTrait
     */
    public function addGenericMusicsOnHold(\Ivoz\Domain\Model\GenericMusicOnHold\GenericMusicOnHold $genericMusicsOnHold);

    /**
     * Remove genericMusicsOnHold
     *
     * @param \Ivoz\Domain\Model\GenericMusicOnHold\GenericMusicOnHold $genericMusicsOnHold
     */
    public function removeGenericMusicsOnHold(\Ivoz\Domain\Model\GenericMusicOnHold\GenericMusicOnHold $genericMusicsOnHold);

    /**
     * Replace genericMusicsOnHold
     *
     * @param \Ivoz\Domain\Model\GenericMusicOnHold\GenericMusicOnHold[] $genericMusicsOnHold
     * @return self
     */
    public function replaceGenericMusicsOnHold(array $genericMusicsOnHold);

    /**
     * Get genericMusicsOnHold
     *
     * @return array
     */
    public function getGenericMusicsOnHold(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add genericCallACLPattern
     *
     * @param \Ivoz\Domain\Model\GenericCallACLPattern\GenericCallACLPattern $genericCallACLPattern
     *
     * @return BrandTrait
     */
    public function addGenericCallACLPattern(\Ivoz\Domain\Model\GenericCallACLPattern\GenericCallACLPattern $genericCallACLPattern);

    /**
     * Remove genericCallACLPattern
     *
     * @param \Ivoz\Domain\Model\GenericCallACLPattern\GenericCallACLPattern $genericCallACLPattern
     */
    public function removeGenericCallACLPattern(\Ivoz\Domain\Model\GenericCallACLPattern\GenericCallACLPattern $genericCallACLPattern);

    /**
     * Replace genericCallACLPatterns
     *
     * @param \Ivoz\Domain\Model\GenericCallACLPattern\GenericCallACLPattern[] $genericCallACLPatterns
     * @return self
     */
    public function replaceGenericCallACLPatterns(array $genericCallACLPatterns);

    /**
     * Get genericCallACLPatterns
     *
     * @return array
     */
    public function getGenericCallACLPatterns(\Doctrine\Common\Collections\Criteria $criteria = null);

}

