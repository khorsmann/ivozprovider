<?php

namespace Ivoz\Domain\Model\Friend;

use Core\Domain\Model\EntityInterface;

interface FriendInterface extends EntityInterface
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
     * @param $exten
     * @return bool
     */
    public function checkExtension($exten);

    /**
     * @param string $exten
     * @return bool canCall
     */
    public function isAllowedToCall($exten);

    /**
     * @brief Return Friend country or company if null
     */
    public function getCountry();

    /**
     * Convert a user dialed number to E164 form
     *
     * param string $number
     * return string number in E164
     */
    public function preferredToE164($prefNumber);

    /**
     * Convert a received number to User prefered format
     *
     * @param unknown $number
     */
    public function E164ToPreferred($e164number);

    public function getRequestDirectUri($callee);

    /**
     * Obtain content for X-Info-Friend header
     *
     * @param called $number
     */
    public function getRequestUri($callee);

    public function getAstPsEndpoint();

    public function getLanguageCode();

    /**
     * Get Friend outgoingDDI
     * If no DDI is assigned, retrieve company's default DDI
     */
    public function getOutgoingDDI();

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
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority);

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority();

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
     * Set country
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $country
     *
     * @return self
     */
    public function setCountry(\Ivoz\Domain\Model\Country\CountryInterface $country = null);

    /**
     * Set callACL
     *
     * @param \Ivoz\Domain\Model\CallACL\CallACLInterface $callACL
     *
     * @return self
     */
    public function setCallACL(\Ivoz\Domain\Model\CallACL\CallACLInterface $callACL = null);

    /**
     * Get callACL
     *
     * @return \Ivoz\Domain\Model\CallACL\CallACLInterface
     */
    public function getCallACL();

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
     * @return FriendTrait
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
     * Add pattern
     *
     * @param \Ivoz\Domain\Model\FriendsPattern\FriendsPatternInterface $pattern
     *
     * @return FriendTrait
     */
    public function addPattern(\Ivoz\Domain\Model\FriendsPattern\FriendsPatternInterface $pattern);

    /**
     * Remove pattern
     *
     * @param \Ivoz\Domain\Model\FriendsPattern\FriendsPatternInterface $pattern
     */
    public function removePattern(\Ivoz\Domain\Model\FriendsPattern\FriendsPatternInterface $pattern);

    /**
     * Replace patterns
     *
     * @param \Ivoz\Domain\Model\FriendsPattern\FriendsPatternInterface[] $patterns
     * @return self
     */
    public function replacePatterns(array $patterns);

    /**
     * Get patterns
     *
     * @return array
     */
    public function getPatterns(\Doctrine\Common\Collections\Criteria $criteria = null);

}

