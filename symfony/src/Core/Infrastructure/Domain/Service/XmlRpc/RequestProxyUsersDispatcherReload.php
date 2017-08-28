<?php

namespace Core\Infrastructure\Domain\Service\XmlRpc;

/**
 * Class RequestProxyUsersDispatcherReload
 * @package Core\Infrastructure\Service\XmlRpc
 */
class RequestProxyUsersDispatcherReload extends AbstractXmlRpcRequest
{
    protected function getProxyServers()
    {
        return [
            'proxyusers' => 'dispatcher.reload',
        ];
    }
}