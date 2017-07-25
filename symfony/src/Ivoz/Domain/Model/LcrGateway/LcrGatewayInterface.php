<?php

namespace Ivoz\Domain\Model\LcrGateway;

use Core\Domain\Model\EntityInterface;

interface LcrGatewayInterface extends EntityInterface
{
    /**
     * Set lcrId
     *
     * @param integer $lcrId
     *
     * @return LcrGatewayInterface
     */
    public function setLcrId($lcrId);


    /**
     * Get lcrId
     *
     * @return integer
     */
    public function getLcrId();


    /**
     * Set gwName
     *
     * @param string $gwName
     *
     * @return LcrGatewayInterface
     */
    public function setGwName($gwName);


    /**
     * Get gwName
     *
     * @return string
     */
    public function getGwName();


    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return LcrGatewayInterface
     */
    public function setIp($ip = null);


    /**
     * Get ip
     *
     * @return string
     */
    public function getIp();


    /**
     * Set hostname
     *
     * @param string $hostname
     *
     * @return LcrGatewayInterface
     */
    public function setHostname($hostname = null);


    /**
     * Get hostname
     *
     * @return string
     */
    public function getHostname();


    /**
     * Set port
     *
     * @param integer $port
     *
     * @return LcrGatewayInterface
     */
    public function setPort($port = null);


    /**
     * Get port
     *
     * @return integer
     */
    public function getPort();


    /**
     * Set params
     *
     * @param string $params
     *
     * @return LcrGatewayInterface
     */
    public function setParams($params = null);


    /**
     * Get params
     *
     * @return string
     */
    public function getParams();


    /**
     * Set uriScheme
     *
     * @param boolean $uriScheme
     *
     * @return LcrGatewayInterface
     */
    public function setUriScheme($uriScheme = null);


    /**
     * Get uriScheme
     *
     * @return boolean
     */
    public function getUriScheme();


    /**
     * Set transport
     *
     * @param boolean $transport
     *
     * @return LcrGatewayInterface
     */
    public function setTransport($transport = null);


    /**
     * Get transport
     *
     * @return boolean
     */
    public function getTransport();


    /**
     * Set strip
     *
     * @param boolean $strip
     *
     * @return LcrGatewayInterface
     */
    public function setStrip($strip = null);


    /**
     * Get strip
     *
     * @return boolean
     */
    public function getStrip();


    /**
     * Set prefix
     *
     * @param string $prefix
     *
     * @return LcrGatewayInterface
     */
    public function setPrefix($prefix = null);


    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix();


    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return LcrGatewayInterface
     */
    public function setTag($tag = null);


    /**
     * Get tag
     *
     * @return string
     */
    public function getTag();


    /**
     * Set flags
     *
     * @param integer $flags
     *
     * @return LcrGatewayInterface
     */
    public function setFlags($flags);


    /**
     * Get flags
     *
     * @return integer
     */
    public function getFlags();


    /**
     * Set defunct
     *
     * @param integer $defunct
     *
     * @return LcrGatewayInterface
     */
    public function setDefunct($defunct = null);


    /**
     * Get defunct
     *
     * @return integer
     */
    public function getDefunct();


    /**
     * Set peerServer
     *
     * @param \Ivoz\Domain\Model\PeerServer\PeerServerInterface $peerServer
     *
     * @return LcrGatewayInterface
     */
    public function setPeerServer(\Ivoz\Domain\Model\PeerServer\PeerServerInterface $peerServer);


    /**
     * Get peerServer
     *
     * @return \Ivoz\Domain\Model\PeerServer\PeerServerInterface
     */
    public function getPeerServer();



}

