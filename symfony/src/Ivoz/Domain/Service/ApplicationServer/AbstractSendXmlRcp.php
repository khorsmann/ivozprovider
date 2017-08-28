<?php

namespace Ivoz\Domain\Service\ApplicationServer;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksDispatcherReload;
use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersDispatcherReload;
use Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface;

abstract class AbstractSendXmlRcp implements ApplicationServerLifecycleEventHandlerInterface
{
    protected $trunksDispatcherReload;
    protected $usersDispatcherReload;

    public function __construct(
        RequestProxyTrunksDispatcherReload $trunksDispatcherReload,
        RequestProxyUsersDispatcherReload $usersDispatcherReload
    ) {
        $this->trunksDispatcherReload = $trunksDispatcherReload;
        $this->usersDispatcherReload = $usersDispatcherReload;
    }

    public function execute(ApplicationServerInterface $entity)
    {
        $this->trunksDispatcherReload->send();
        $this->usersDispatcherReload->send();
    }
}