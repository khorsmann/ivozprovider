<?php

namespace Kam\Infrastructure\Domain\Service\PikeTrusted;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksPermissionsTrustedReload;
use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersPermissionsTrustedReload;
use Kam\Domain\Model\PikeTrusted\PikeTrustedInterface;
use Kam\Domain\Service\PikeTrusted\PikeTrustedLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements PikeTrustedLifecycleEventHandlerInterface
{
    protected $usersPermissionsTrustedReload;
    protected $trunksPermissionsTrustedReload;

    public function __construct(
        RequestProxyUsersPermissionsTrustedReload $usersPermissionsTrustedReload,
        RequestProxyTrunksPermissionsTrustedReload $trunksPermissionsTrustedReload
    ) {
        $this->usersPermissionsTrustedReload = $usersPermissionsTrustedReload;
        $this->trunksPermissionsTrustedReload = $trunksPermissionsTrustedReload;
    }

    public function execute(PikeTrustedInterface $entity)
    {
        $this->usersPermissionsTrustedReload->send();
        $this->trunksPermissionsTrustedReload->send();
    }
}