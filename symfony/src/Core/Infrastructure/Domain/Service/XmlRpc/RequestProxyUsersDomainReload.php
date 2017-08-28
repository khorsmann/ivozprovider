<?php

namespace Core\Infrastructure\Domain\Service\XmlRpc;

/**
 * Class RequestProxyUsersDomainReload
 * @package Core\Infrastructure\Service\XmlRpc
 */
class RequestProxyUsersDomainReload extends AbstractXmlRpcRequest
{
    protected function getProxyServers()
    {
        return [
            'proxyusers' => "domain.reload",
        ];
    }
}