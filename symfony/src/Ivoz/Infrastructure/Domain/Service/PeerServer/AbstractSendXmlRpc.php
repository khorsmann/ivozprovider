<?php

namespace Ivoz\Infrastructure\PeerServer\Service\PeerServer;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReload;
use Ivoz\Domain\Model\PeerServer\PeerServerInterface;
use Ivoz\Domain\Service\PeerServer\PeerServerLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements PeerServerLifecycleEventHandlerInterface
{
    protected $trunksLcrReload;

    public function __construct(
        RequestProxyTrunksLcrReload $trunksLcrReload
    ) {
        $this->trunksLcrReload = $trunksLcrReload;
    }

    public function execute(PeerServerInterface $entity, $isNew)
    {
        $this->trunksLcrReload->send();
    }
}