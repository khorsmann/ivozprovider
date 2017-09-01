<?php

namespace Ivoz\Infrastructure\OutgoingRouting\Service\OutgoingRouting;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReload;
use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;
use Ivoz\Domain\Service\OutgoingRouting\OutgoingRoutingLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements OutgoingRoutingLifecycleEventHandlerInterface
{
    protected $trunksLcrReload;

    public function __construct(
        RequestProxyTrunksLcrReload $trunksLcrReload
    ) {
        $this->trunksLcrReload = $trunksLcrReload;
    }

    public function execute(OutgoingRoutingInterface $entity)
    {
        $this->trunksLcrReload->send();
    }
}