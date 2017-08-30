<?php

namespace Kam\Infrastructure\Domain\Service\TrunksUacreg;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksUacRegReload;
use Kam\Domain\Model\TrunksUacreg\TrunksUacregInterface;
use Kam\Domain\Service\TrunksUacreg\TrunksUacregLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements TrunksUacregLifecycleEventHandlerInterface
{
    protected $trunksUacRegReload;

    public function __construct(
        RequestProxyTrunksUacRegReload $trunksUacRegReload
    ) {
        $this->trunksUacRegReload = $trunksUacRegReload;
    }

    public function execute(TrunksUacregInterface $entity)
    {
        $this->trunksUacRegReload->send();
    }
}