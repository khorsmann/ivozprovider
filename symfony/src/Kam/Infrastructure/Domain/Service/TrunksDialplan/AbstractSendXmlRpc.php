<?php

namespace Kam\Infrastructure\Domain\Service\TrunksDialplan;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksDialplanReload;
use Kam\Domain\Model\TrunksDialplan\TrunksDialplanInterface;
use Kam\Domain\Service\TrunksDialplan\TrunksDialplanLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements TrunksDialplanLifecycleEventHandlerInterface
{
    protected $trunksDialplanReload;

    public function __construct(
        RequestProxyTrunksDialplanReload $trunksDialplanReload
    ) {
        $this->trunksDialplanReload = $trunksDialplanReload;
    }

    public function execute(TrunksDialplanInterface $entity)
    {
        $this->trunksDialplanReload->send();
    }
}