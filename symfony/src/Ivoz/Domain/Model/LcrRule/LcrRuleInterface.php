<?php

namespace Ivoz\Domain\Model\LcrRule;

use Core\Domain\Model\EntityInterface;

interface LcrRuleInterface extends EntityInterface
{
    public function setOutgoingRouting(\Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting);

    public function setCondition($regexp);

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
     * Set prefix
     *
     * @param string $prefix
     *
     * @return self
     */
    public function setPrefix($prefix = null);

    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix();

    /**
     * Set fromUri
     *
     * @param string $fromUri
     *
     * @return self
     */
    public function setFromUri($fromUri = null);

    /**
     * Get fromUri
     *
     * @return string
     */
    public function getFromUri();

    /**
     * Set requestUri
     *
     * @param string $requestUri
     *
     * @return self
     */
    public function setRequestUri($requestUri = null);

    /**
     * Get requestUri
     *
     * @return string
     */
    public function getRequestUri();

    /**
     * Set stopper
     *
     * @param integer $stopper
     *
     * @return self
     */
    public function setStopper($stopper);

    /**
     * Get stopper
     *
     * @return integer
     */
    public function getStopper();

    /**
     * Set enabled
     *
     * @param integer $enabled
     *
     * @return self
     */
    public function setEnabled($enabled);

    /**
     * Get enabled
     *
     * @return integer
     */
    public function getEnabled();

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return self
     */
    public function setTag($tag);

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag();

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
     * Set routingPattern
     *
     * @param \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern
     *
     * @return self
     */
    public function setRoutingPattern(\Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern = null);

    /**
     * Get routingPattern
     *
     * @return \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern();

    /**
     * Get outgoingRouting
     *
     * @return \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    public function getOutgoingRouting();

}

