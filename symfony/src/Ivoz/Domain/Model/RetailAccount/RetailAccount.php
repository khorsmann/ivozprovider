<?php

namespace Ivoz\Domain\Model\RetailAccount;
use Ivoz\Domain\Model\Country\CountryInterface;
use Ivoz\Domain\Model\DDI\DDIInterface;

/**
 * RetailAccount
 */
class RetailAccount extends RetailAccountAbstract implements RetailAccountInterface
{
    use RetailAccountTrait;

    /**
     * @return string
     */
    public function getContact()
    {
        return sprintf("sip:%s@%s",
            $this->getName(),
            $this->getDomain());
    }

    /**
     * @return string
     */
    public function getSorcery()
    {
        return sprintf("b%dc%dr%d_%s",
            $this->getCompany()->getBrand()->getId(),
            $this->getCompany()->getId(),
            $this->getId(),
            $this->getName());
    }

    /**
     * @brief Return Retail Account country or company if null
     * @return CountryInterface
     */
    public function getCountry()
    {
        $country = parent::getCountry();
        if (!is_null($country)) {
            return $country;
        }

        return $this->getCompany()->getCountry();
    }

    /**
     * @deprecated use getCountry instead
     */
    public function getCountries()
    {
        return $this->getCountry();
    }

    /**
     * Convert a user dialed number to E164 form
     *
     * @param string $number
     * @return string number in E164
     */
    public function preferredToE164($prefnumber)
    {
        // Remove company outbound prefix
        $prefnumber = $this
            ->getCompany()
            ->removeOutboundPrefix($prefnumber);

        // Get user country
        $country = $this->getCountry();

        // Return e164 number dialed by this user
        return $country
            ->preferredToE164($prefnumber, $this->getAreaCode());
    }

    /**
     * Convert a received number to User prefered format
     *
     * @param number $number
     */
    public function E164ToPreferred($e164number)
    {
        // Get User country
        $country = $this->getCountry();

        // Convert from E164 to user country preferred format
        $prefnumber = $country
            ->E164ToPreferred(
                $e164number,
                $this->getAreaCode()
            );

        // Add Company outbound prefix
        return $this
            ->getCompany()
            ->addOutboundPrefix($prefnumber);
    }

    /**
     * Obtain content for X-Info-Retail header
     *
     * @param mixed $callee
     * @return string
     */
    public function getRequestUri($callee)
    {
        if ($this->getDirectConnectivity() == 'yes') {
            return $this->getRequestDirectUri($callee);
        }

        // Only Kamailio knows this!
        return 'dynamic';
    }

    /**
     * @param $callee
     * @return string
     */
    public function getRequestDirectUri($callee)
    {
        $uri = sprintf('sip:%s@%s', $callee, $this->getIp());

        // Check if the configured port is not the standard (5060)
        $port = $this->getPort();
        if (!is_null($port) && $port != 5060) {
            $uri .= ":$port";
        }

        // Check if the configured transport is not the standard (UDP)
        $transport = $this->getTransport();
        if ($transport != 'udp') {
            $uri .= ";transport=$tranport";
        }

        return $uri;
    }

    public function getAstPsEndpoint()
    {
        $psEndpoints = $this->getPsEndpoints();

        return array_shift($psEndpoints);
    }

    public function getLanguageCode()
    {
        $language = $this->getLanguage();
        if ($language) {
            return $language->getIden();
        }

        return $this->getCompany()->getLanguageCode();
    }

    /**
     * Get Retail Account outgoingDDI
     * If no DDI is assigned, retrieve company's default DDI
     * @return \IvozProvider\Model\Raw\DDIs or NULL
     */
    public function getOutgoingDDI()
    {
        $ddi = parent::getOutgoingDDI();
        if (!is_null($ddi)) {
            return $ddi;
        }

        return $this
            ->getCompany()
            ->getOutgoingDDI();
    }

    /**
     * Get DDI associated with this retail Account
     *
     * @return DDIInterface
     */
    public function getDDI($ddieE164)
    {
        return array_shift(
            $this->getDDIs()
        );
    }
}

