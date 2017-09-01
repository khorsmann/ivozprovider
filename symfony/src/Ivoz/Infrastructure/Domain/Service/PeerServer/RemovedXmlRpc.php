<?php

namespace Ivoz\Infrastructure\PeerServer\Service\PeerServer;

use Core\Infrastructure\PeerServer\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\PeerServer\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\PeerServer\PeerServerInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Ivoz\PeerServer\Service\PeerServer
 * @lifecycle post_remove
 */
class RemovedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(PeerServerInterface $entity, $isNew)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>LCR Gateways may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}