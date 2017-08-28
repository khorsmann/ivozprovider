<?php

namespace Kam\Domain\Service\TrunksDialplan;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksDialplanReload;
use Kam\Domain\Model\TrunksDialplan\TrunksDialplanInterface;

abstract class AbstractSendXmlRcp implements TrunksDialplanLifecycleEventHandlerInterface
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