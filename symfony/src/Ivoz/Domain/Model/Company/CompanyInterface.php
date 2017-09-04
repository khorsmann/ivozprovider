<?php

namespace Ivoz\Domain\Model\Company;

use Core\Domain\Model\EntityInterface;

interface CompanyInterface extends EntityInterface
{
    /**
     *
     * @param string $exten
     * @return string
     */
    public function getTypeCall($exten);

    public function getExtension($exten);

    public function getDDI($ddieE164);

    public function getFriend($exten);

    public function getService($exten);

    public function getTerminal($name);

    public function getCompanyActivePricingPlan($date = null);

    public function getLanguageCode();

    /**
     * @brief Get musicclass for given company
     *
     * If no specific company music on hold is found, brand music will be used.
     * If no specific brand music  on hold is found, dafault music will be sued.
     *
     */
    public function getMusicClass();

    /**
     * Ensures valid domain value
     * @param string $data
     * @return \IvozProvider\Model\Raw\Companies
     * @throws \Exception
     */
    public function setDomainUsers($domainUsers = null);

    /**
     * Get associated user domain for this company
     */
    public function getDomain();

    /**
     *
     * @param string $number
     * @return bool tarificable
     */
    public function isDstTarificable($number);

    /**
     * Convert a company dialed number to E164 form
     *
     * param string $number
     * return string number in E164
     */
    public function preferredToE164($prefnumber);

    /**
     * Convert a received number to Company prefered format
     *
     * @param unknown $number
     */
    public function E164ToPreferred($e164number);

    /**
     * Gets company area code if company country uses area code
     *
     * @return string
     */
    public function getAreaCodeValue();

    /**
     * @param $number
     * @return string
     */
    public function removeOutboundPrefix($number);

    /**
     * @param $number
     * @return string
     */
    public function addOutboundPrefix($number);

    public function getOutgoingRoutings();

    /**
     * Get the size in bytes used by the recordings on this company
     */
    public function getRecordingsDiskUsage();

    /**
     * Get the size in bytes for disk usage limit on this company
     */
    public function getRecordingsLimit();

    public function hasFeature($featureId);

    /**
     * Get On demand recording code DTMFs
     */
    public function getOnDemandRecordDTMFs();

    public function getFeatures();

    /**
     * Set type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type);

    /**
     * Get type
     *
     * @return string
     */
    public function getType();

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
     * Get domainUsers
     *
     * @return string
     */
    public function getDomainUsers();

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
     * Set externalMaxCalls
     *
     * @param integer $externalMaxCalls
     *
     * @return self
     */
    public function setExternalMaxCalls($externalMaxCalls);

    /**
     * Get externalMaxCalls
     *
     * @return integer
     */
    public function getExternalMaxCalls();

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
     * Set countryName
     *
     * @param string $countryName
     *
     * @return self
     */
    public function setCountryName($countryName);

    /**
     * Get countryName
     *
     * @return string
     */
    public function getCountryName();

    /**
     * Set outboundPrefix
     *
     * @param string $outboundPrefix
     *
     * @return self
     */
    public function setOutboundPrefix($outboundPrefix = null);

    /**
     * Get outboundPrefix
     *
     * @return string
     */
    public function getOutboundPrefix();

    /**
     * Set ipfilter
     *
     * @param boolean $ipfilter
     *
     * @return self
     */
    public function setIpfilter($ipfilter = null);

    /**
     * Get ipfilter
     *
     * @return boolean
     */
    public function getIpfilter();

    /**
     * Set onDemandRecord
     *
     * @param boolean $onDemandRecord
     *
     * @return self
     */
    public function setOnDemandRecord($onDemandRecord = null);

    /**
     * Get onDemandRecord
     *
     * @return boolean
     */
    public function getOnDemandRecord();

    /**
     * Set onDemandRecordCode
     *
     * @param string $onDemandRecordCode
     *
     * @return self
     */
    public function setOnDemandRecordCode($onDemandRecordCode = null);

    /**
     * Get onDemandRecordCode
     *
     * @return string
     */
    public function getOnDemandRecordCode();

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
     * Set externallyextraopts
     *
     * @param string $externallyextraopts
     *
     * @return self
     */
    public function setExternallyextraopts($externallyextraopts = null);

    /**
     * Get externallyextraopts
     *
     * @return string
     */
    public function getExternallyextraopts();

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
     * Set recordingsLimitEmail
     *
     * @param string $recordingsLimitEmail
     *
     * @return self
     */
    public function setRecordingsLimitEmail($recordingsLimitEmail = null);

    /**
     * Get recordingsLimitEmail
     *
     * @return string
     */
    public function getRecordingsLimitEmail();

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
     * Set mediaRelaySets
     *
     * @param \Ivoz\Domain\Model\MediaRelaySet\MediaRelaySetInterface $mediaRelaySets
     *
     * @return self
     */
    public function setMediaRelaySets(\Ivoz\Domain\Model\MediaRelaySet\MediaRelaySetInterface $mediaRelaySets = null);

    /**
     * Get mediaRelaySets
     *
     * @return \Ivoz\Domain\Model\MediaRelaySet\MediaRelaySetInterface
     */
    public function getMediaRelaySets();

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
     * Set applicationServer
     *
     * @param \Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface $applicationServer
     *
     * @return self
     */
    public function setApplicationServer(\Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface $applicationServer = null);

    /**
     * Get applicationServer
     *
     * @return \Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface
     */
    public function getApplicationServer();

    /**
     * Set country
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $country
     *
     * @return self
     */
    public function setCountry(\Ivoz\Domain\Model\Country\CountryInterface $country = null);

    /**
     * Get country
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getCountry();

    /**
     * Set outgoingDDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $outgoingDDI
     *
     * @return self
     */
    public function setOutgoingDDI(\Ivoz\Domain\Model\DDI\DDIInterface $outgoingDDI = null);

    /**
     * Get outgoingDDI
     *
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getOutgoingDDI();

    /**
     * Set outgoingDDIRule
     *
     * @param \Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface $outgoingDDIRule
     *
     * @return self
     */
    public function setOutgoingDDIRule(\Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface $outgoingDDIRule = null);

    /**
     * Get outgoingDDIRule
     *
     * @return \Ivoz\Domain\Model\OutgoingDDIRule\OutgoingDDIRuleInterface
     */
    public function getOutgoingDDIRule();

    /**
     * Add extension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $extension
     *
     * @return CompanyTrait
     */
    public function addExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $extension);

    /**
     * Remove extension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $extension
     */
    public function removeExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $extension);

    /**
     * Replace extensions
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface[] $extensions
     * @return self
     */
    public function replaceExtensions(array $extensions);

    /**
     * Get extensions
     *
     * @return array
     */
    public function getExtensions(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add ddi
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $ddi
     *
     * @return CompanyTrait
     */
    public function addDdi(\Ivoz\Domain\Model\DDI\DDIInterface $ddi);

    /**
     * Remove ddi
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $ddi
     */
    public function removeDdi(\Ivoz\Domain\Model\DDI\DDIInterface $ddi);

    /**
     * Replace ddis
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface[] $ddis
     * @return self
     */
    public function replaceDdis(array $ddis);

    /**
     * Get ddis
     *
     * @return array
     */
    public function getDdis(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add friend
     *
     * @param \Ivoz\Domain\Model\Friend\FriendInterface $friend
     *
     * @return CompanyTrait
     */
    public function addFriend(\Ivoz\Domain\Model\Friend\FriendInterface $friend);

    /**
     * Remove friend
     *
     * @param \Ivoz\Domain\Model\Friend\FriendInterface $friend
     */
    public function removeFriend(\Ivoz\Domain\Model\Friend\FriendInterface $friend);

    /**
     * Replace friends
     *
     * @param \Ivoz\Domain\Model\Friend\FriendInterface[] $friends
     * @return self
     */
    public function replaceFriends(array $friends);

    /**
     * Get friends
     *
     * @return array
     */
    public function getFriends(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add companyService
     *
     * @param \Ivoz\Domain\Model\CompanyService\CompanyServiceInterface $companyService
     *
     * @return CompanyTrait
     */
    public function addCompanyService(\Ivoz\Domain\Model\CompanyService\CompanyServiceInterface $companyService);

    /**
     * Remove companyService
     *
     * @param \Ivoz\Domain\Model\CompanyService\CompanyServiceInterface $companyService
     */
    public function removeCompanyService(\Ivoz\Domain\Model\CompanyService\CompanyServiceInterface $companyService);

    /**
     * Replace companyServices
     *
     * @param \Ivoz\Domain\Model\CompanyService\CompanyServiceInterface[] $companyServices
     * @return self
     */
    public function replaceCompanyServices(array $companyServices);

    /**
     * Get companyServices
     *
     * @return array
     */
    public function getCompanyServices(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add terminal
     *
     * @param \Ivoz\Domain\Model\Terminal\TerminalInterface $terminal
     *
     * @return CompanyTrait
     */
    public function addTerminal(\Ivoz\Domain\Model\Terminal\TerminalInterface $terminal);

    /**
     * Remove terminal
     *
     * @param \Ivoz\Domain\Model\Terminal\TerminalInterface $terminal
     */
    public function removeTerminal(\Ivoz\Domain\Model\Terminal\TerminalInterface $terminal);

    /**
     * Replace terminals
     *
     * @param \Ivoz\Domain\Model\Terminal\TerminalInterface[] $terminals
     * @return self
     */
    public function replaceTerminals(array $terminals);

    /**
     * Get terminals
     *
     * @return array
     */
    public function getTerminals(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add relPricingPlan
     *
     * @param \Ivoz\Domain\Model\PricingPlansRelCompany\PricingPlansRelCompanyInterface $relPricingPlan
     *
     * @return CompanyTrait
     */
    public function addRelPricingPlan(\Ivoz\Domain\Model\PricingPlansRelCompany\PricingPlansRelCompanyInterface $relPricingPlan);

    /**
     * Remove relPricingPlan
     *
     * @param \Ivoz\Domain\Model\PricingPlansRelCompany\PricingPlansRelCompanyInterface $relPricingPlan
     */
    public function removeRelPricingPlan(\Ivoz\Domain\Model\PricingPlansRelCompany\PricingPlansRelCompanyInterface $relPricingPlan);

    /**
     * Replace relPricingPlans
     *
     * @param \Ivoz\Domain\Model\PricingPlansRelCompany\PricingPlansRelCompanyInterface[] $relPricingPlans
     * @return self
     */
    public function replaceRelPricingPlans(array $relPricingPlans);

    /**
     * Get relPricingPlans
     *
     * @return array
     */
    public function getRelPricingPlans(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add musicsOnHold
     *
     * @param \Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface $musicsOnHold
     *
     * @return CompanyTrait
     */
    public function addMusicsOnHold(\Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface $musicsOnHold);

    /**
     * Remove musicsOnHold
     *
     * @param \Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface $musicsOnHold
     */
    public function removeMusicsOnHold(\Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface $musicsOnHold);

    /**
     * Replace musicsOnHold
     *
     * @param \Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface[] $musicsOnHold
     * @return self
     */
    public function replaceMusicsOnHold(array $musicsOnHold);

    /**
     * Get musicsOnHold
     *
     * @return array
     */
    public function getMusicsOnHold(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add recording
     *
     * @param \Ivoz\Domain\Model\Recording\RecordingInterface $recording
     *
     * @return CompanyTrait
     */
    public function addRecording(\Ivoz\Domain\Model\Recording\RecordingInterface $recording);

    /**
     * Remove recording
     *
     * @param \Ivoz\Domain\Model\Recording\RecordingInterface $recording
     */
    public function removeRecording(\Ivoz\Domain\Model\Recording\RecordingInterface $recording);

    /**
     * Replace recordings
     *
     * @param \Ivoz\Domain\Model\Recording\RecordingInterface[] $recordings
     * @return self
     */
    public function replaceRecordings(array $recordings);

    /**
     * Get recordings
     *
     * @return array
     */
    public function getRecordings(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add relFeature
     *
     * @param \Ivoz\Domain\Model\FeaturesRelCompany\FeaturesRelCompanyInterface $relFeature
     *
     * @return CompanyTrait
     */
    public function addRelFeature(\Ivoz\Domain\Model\FeaturesRelCompany\FeaturesRelCompanyInterface $relFeature);

    /**
     * Remove relFeature
     *
     * @param \Ivoz\Domain\Model\FeaturesRelCompany\FeaturesRelCompanyInterface $relFeature
     */
    public function removeRelFeature(\Ivoz\Domain\Model\FeaturesRelCompany\FeaturesRelCompanyInterface $relFeature);

    /**
     * Replace relFeatures
     *
     * @param \Ivoz\Domain\Model\FeaturesRelCompany\FeaturesRelCompanyInterface[] $relFeatures
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
     * Add callACLPattern
     *
     * @param \Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern
     *
     * @return CompanyTrait
     */
    public function addCallACLPattern(\Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern);

    /**
     * Remove callACLPattern
     *
     * @param \Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern
     */
    public function removeCallACLPattern(\Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern);

    /**
     * Replace callACLPatterns
     *
     * @param \Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface[] $callACLPatterns
     * @return self
     */
    public function replaceCallACLPatterns(array $callACLPatterns);

    /**
     * Get callACLPatterns
     *
     * @return array
     */
    public function getCallACLPatterns(\Doctrine\Common\Collections\Criteria $criteria = null);

    /**
     * Add domain
     *
     * @param \Ivoz\Domain\Model\Domain\DomainInterface $domain
     *
     * @return CompanyTrait
     */
    public function addDomain(\Ivoz\Domain\Model\Domain\DomainInterface $domain);

    /**
     * Remove domain
     *
     * @param \Ivoz\Domain\Model\Domain\DomainInterface $domain
     */
    public function removeDomain(\Ivoz\Domain\Model\Domain\DomainInterface $domain);

    /**
     * Replace domains
     *
     * @param \Ivoz\Domain\Model\Domain\DomainInterface[] $domains
     * @return self
     */
    public function replaceDomains(array $domains);

    /**
     * Get domains
     *
     * @return array
     */
    public function getDomains(\Doctrine\Common\Collections\Criteria $criteria = null);

}

