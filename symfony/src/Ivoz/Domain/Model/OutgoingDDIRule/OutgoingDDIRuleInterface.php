<?php

namespace Ivoz\Domain\Model\OutgoingDDIRule;

use Core\Domain\Model\EntityInterface;

interface OutgoingDDIRuleInterface extends EntityInterface
{
    /**
     * Return forced DDI for this rule
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getForcedDDI();

    /**
     * Check final outgoing DDI presentation for given destination
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getOutgoingDDI($originalDDI, $e164destination);

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
     * Set defaultAction
     *
     * @param string $defaultAction
     *
     * @return self
     */
    public function setDefaultAction($defaultAction);

    /**
     * Get defaultAction
     *
     * @return string
     */
    public function getDefaultAction();

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
     * Set forcedDDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $forcedDDI
     *
     * @return self
     */
    public function setForcedDDI(\Ivoz\Domain\Model\DDI\DDIInterface $forcedDDI = null);

    /**
     * Add pattern
     *
     * @param \Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface $pattern
     *
     * @return OutgoingDDIRuleTrait
     */
    public function addPattern(\Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface $pattern);

    /**
     * Remove pattern
     *
     * @param \Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface $pattern
     */
    public function removePattern(\Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface $pattern);

    /**
     * Replace patterns
     *
     * @param \Ivoz\Domain\Model\OutgoingDDIRulesPattern\OutgoingDDIRulesPatternInterface[] $patterns
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

