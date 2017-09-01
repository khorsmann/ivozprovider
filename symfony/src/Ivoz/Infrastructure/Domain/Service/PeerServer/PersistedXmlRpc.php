<?php

namespace Ivoz\Infrastructure\PeerServer\Service\PeerServer;

use Ivoz\Domain\Model\PeerServer\PeerServerInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Ivoz\PeerServer\Service\PeerServer
 * @lifecycle post_persist
 */
class PersistedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(PeerServerInterface $entity, $isNew)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>LCR Gateways may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}