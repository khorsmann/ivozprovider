<?php

namespace Ivoz\Infrastructure\RoutingPatternGroup\Service\RoutingPatternGroup;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReload;
use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface;
use Ivoz\Domain\Service\RoutingPatternGroup\PickUpRelUserLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements PickUpRelUserLifecycleEventHandlerInterface
{
    protected $trunksLcrReload;

    public function __construct(
        RequestProxyTrunksLcrReload $trunksLcrReload
    ) {
        $this->trunksLcrReload = $trunksLcrReload;
    }

    public function execute(RoutingPatternGroupInterface $entity, $isNew)
    {
        $this->trunksLcrReload->send();
    }
}