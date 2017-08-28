<?php

namespace Core\Infrastructure\Domain\Service\XmlRpc;

/**
 * Class RequestProxyUsersDomainReload
 * @package Core\Infrastructure\Service\XmlRpc
 */
class RequestProxyUsersPermissionsAddressReload extends AbstractXmlRpcRequest
{
    protected function getProxyServers()
    {
        return [
            'proxyusers' => "permissions.addressReload",
        ];
    }
}