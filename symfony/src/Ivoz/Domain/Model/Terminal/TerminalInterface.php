<?php

namespace Ivoz\Domain\Model\Terminal;

use Core\Domain\Model\EntityInterface;

interface TerminalInterface extends EntityInterface
{
    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null);

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
     * Set allowAudio
     *
     * @param string $allowAudio
     *
     * @return self
     */
    public function setAllowAudio($allowAudio);

    /**
     * Get allowAudio
     *
     * @return string
     */
    public function getAllowAudio();

    /**
     * Set allowVideo
     *
     * @param string $allowVideo
     *
     * @return self
     */
    public function setAllowVideo($allowVideo = null);

    /**
     * Get allowVideo
     *
     * @return string
     */
    public function getAllowVideo();

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
     * Set password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword($password);

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword();

    /**
     * Set mac
     *
     * @param string $mac
     *
     * @return self
     */
    public function setMac($mac = null);

    /**
     * Get mac
     *
     * @return string
     */
    public function getMac();

    /**
     * Set lastProvisionDate
     *
     * @param \DateTime $lastProvisionDate
     *
     * @return self
     */
    public function setLastProvisionDate($lastProvisionDate = null);

    /**
     * Get lastProvisionDate
     *
     * @return \DateTime
     */
    public function getLastProvisionDate();

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
     * Set terminalModel
     *
     * @param \Ivoz\Domain\Model\TerminalModel\TerminalModelInterface $terminalModel
     *
     * @return self
     */
    public function setTerminalModel(\Ivoz\Domain\Model\TerminalModel\TerminalModelInterface $terminalModel = null);

    /**
     * Get terminalModel
     *
     * @return \Ivoz\Domain\Model\TerminalModel\TerminalModelInterface
     */
    public function getTerminalModel();

    /**
     * Add astPsEndpoint
     *
     * @param \Ast\Domain\Model\PsEndpoint\PsEndpoint $astPsEndpoint
     *
     * @return TerminalTrait
     */
    public function addAstPsEndpoint(\Ast\Domain\Model\PsEndpoint\PsEndpoint $astPsEndpoint);

    /**
     * Remove astPsEndpoint
     *
     * @param \Ast\Domain\Model\PsEndpoint\PsEndpoint $astPsEndpoint
     */
    public function removeAstPsEndpoint(\Ast\Domain\Model\PsEndpoint\PsEndpoint $astPsEndpoint);

    /**
     * Replace astPsEndpoints
     *
     * @param \Ast\Domain\Model\PsEndpoint\PsEndpoint[] $astPsEndpoints
     * @return self
     */
    public function replaceAstPsEndpoints(array $astPsEndpoints);

    /**
     * Get astPsEndpoints
     *
     * @return array
     */
    public function getAstPsEndpoints(\Doctrine\Common\Collections\Criteria $criteria = null);

}

