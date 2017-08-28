<?php

namespace Core\Infrastructure\Domain\Service\XmlRpc;

/**
 * Class RequestProxyTrunksPermissionsTrustedReload
 * @package Core\Infrastructure\Service\XmlRpc
 */
class RequestProxyTrunksPermissionsTrustedReload extends AbstractXmlRpcRequest
{
    protected function getProxyServers()
    {
        return [
            'proxytrunks' => "permissions.trustedReload",
        ];
    }
}