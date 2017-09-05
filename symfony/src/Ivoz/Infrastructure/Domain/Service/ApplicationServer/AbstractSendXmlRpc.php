<?php

namespace Ivoz\Infrastructure\Domain\Service\ApplicationServer;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksDispatcherReload;
use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersDispatcherReload;
use Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface;
use Ivoz\Domain\Service\ApplicationServer\ApplicationServerLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements ApplicationServerLifecycleEventHandlerInterface
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

    public function execute(ApplicationServerInterface $entity, $isNew)
    {
        $this->trunksDispatcherReload->send();
        $this->usersDispatcherReload->send();
    }
}