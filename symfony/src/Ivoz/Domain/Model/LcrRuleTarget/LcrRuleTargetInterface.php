<?php

namespace Ivoz\Domain\Model\LcrRuleTarget;

use Core\Domain\Model\EntityInterface;

interface LcrRuleTargetInterface extends EntityInterface
{
    /**
     * Set lcrId
     *
     * @param integer $lcrId
     *
     * @return self
     */
    public function setLcrId($lcrId);

    /**
     * Get lcrId
     *
     * @return integer
     */
    public function getLcrId();

    /**
     * Set priority
     *
     * @param boolean $priority
     *
     * @return self
     */
    public function setPriority($priority);

    /**
     * Get priority
     *
     * @return boolean
     */
    public function getPriority();

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return self
     */
    public function setWeight($weight);

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight();

    /**
     * Set rule
     *
     * @param \Ivoz\Domain\Model\LcrRule\LcrRuleInterface $rule
     *
     * @return self
     */
    public function setRule(\Ivoz\Domain\Model\LcrRule\LcrRuleInterface $rule);

    /**
     * Get rule
     *
     * @return \Ivoz\Domain\Model\LcrRule\LcrRuleInterface
     */
    public function getRule();

    /**
     * Set gw
     *
     * @param \Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface $gw
     *
     * @return self
     */
    public function setGw(\Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface $gw);

    /**
     * Get gw
     *
     * @return \Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface
     */
    public function getGw();

    /**
     * Set outgoingRouting
     *
     * @param \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     *
     * @return self
     */
    public function setOutgoingRouting(\Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting);

    /**
     * Get outgoingRouting
     *
     * @return \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    public function getOutgoingRouting();

}

