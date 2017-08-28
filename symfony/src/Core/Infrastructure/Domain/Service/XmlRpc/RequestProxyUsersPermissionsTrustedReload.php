<?php

namespace Core\Infrastructure\Domain\Service\XmlRpc;

/**
 * Class RequestProxyUsersPermissionsTrustedReload
 * @package Core\Infrastructure\Service\XmlRpc
 */
class RequestProxyUsersPermissionsTrustedReload extends AbstractXmlRpcRequest
{
    protected function getProxyServers()
    {
        return [
            'proxyusers' => "permissions.trustedReload",
        ];
    }
}