<?php

namespace Kam\Domain\Model\TrunksDialplan;

use Core\Domain\Model\EntityInterface;

interface TrunksDialplanInterface extends EntityInterface
{
    /**
     * Set dpid
     *
     * @param integer $dpid
     *
     * @return self
     */
    public function setDpid($dpid);

    /**
     * Get dpid
     *
     * @return integer
     */
    public function getDpid();

    /**
     * Set pr
     *
     * @param integer $pr
     *
     * @return self
     */
    public function setPr($pr);

    /**
     * Get pr
     *
     * @return integer
     */
    public function getPr();

    /**
     * Set matchOp
     *
     * @param integer $matchOp
     *
     * @return self
     */
    public function setMatchOp($matchOp);

    /**
     * Get matchOp
     *
     * @return integer
     */
    public function getMatchOp();

    /**
     * Set matchExp
     *
     * @param string $matchExp
     *
     * @return self
     */
    public function setMatchExp($matchExp);

    /**
     * Get matchExp
     *
     * @return string
     */
    public function getMatchExp();

    /**
     * Set matchLen
     *
     * @param integer $matchLen
     *
     * @return self
     */
    public function setMatchLen($matchLen);

    /**
     * Get matchLen
     *
     * @return integer
     */
    public function getMatchLen();

    /**
     * Set substExp
     *
     * @param string $substExp
     *
     * @return self
     */
    public function setSubstExp($substExp);

    /**
     * Get substExp
     *
     * @return string
     */
    public function getSubstExp();

    /**
     * Set replExp
     *
     * @param string $replExp
     *
     * @return self
     */
    public function setReplExp($replExp);

    /**
     * Get replExp
     *
     * @return string
     */
    public function getReplExp();

    /**
     * Set attrs
     *
     * @param string $attrs
     *
     * @return self
     */
    public function setAttrs($attrs);

    /**
     * Get attrs
     *
     * @return string
     */
    public function getAttrs();

    /**
     * Set transformationRulesetGroupsTrunk
     *
     * @param \Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface $transformationRulesetGroupsTrunk
     *
     * @return self
     */
    public function setTransformationRulesetGroupsTrunk(\Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface $transformationRulesetGroupsTrunk);

    /**
     * Get transformationRulesetGroupsTrunk
     *
     * @return \Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface
     */
    public function getTransformationRulesetGroupsTrunk();

}
