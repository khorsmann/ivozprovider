<?php

namespace Ivoz\Domain\Model\LcrGateway;

use Core\Domain\Model\EntityInterface;

interface LcrGatewayInterface extends EntityInterface
{
    /**
     * Get lcrId
     *
     * @return integer
     */
    public function getLcrId();


    /**
     * Get gwName
     *
     * @return string
     */
    public function getGwName();


    /**
     * Get ip
     *
     * @return string
     */
    public function getIp();


    /**
     * Get hostname
     *
     * @return string
     */
    public function getHostname();


    /**
     * Get port
     *
     * @return integer
     */
    public function getPort();


    /**
     * Get params
     *
     * @return string
     */
    public function getParams();


    /**
     * Get uriScheme
     *
     * @return boolean
     */
    public function getUriScheme();


    /**
     * Get transport
     *
     * @return boolean
     */
    public function getTransport();


    /**
     * Get strip
     *
     * @return boolean
     */
    public function getStrip();


    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix();


    /**
     * Get tag
     *
     * @return string
     */
    public function getTag();


    /**
     * Get flags
     *
     * @return integer
     */
    public function getFlags();


    /**
     * Get defunct
     *
     * @return integer
     */
    public function getDefunct();


    /**
     * Get peerServer
     *
     * @return \Ivoz\Domain\Model\PeerServer\PeerServerInterface
     */
    public function getPeerServer();



}

