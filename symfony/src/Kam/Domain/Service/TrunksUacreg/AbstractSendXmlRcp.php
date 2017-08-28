<?php

namespace Kam\Domain\Service\TrunksUacreg;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksUacRegReload;
use Kam\Domain\Model\TrunksUacreg\TrunksUacregInterface;

abstract class AbstractSendXmlRcp implements TrunksUacregLifecycleEventHandlerInterface
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