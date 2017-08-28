<?php

namespace Core\Infrastructure\Domain\Service\XmlRpc;

/**
 * Class RequestProxyTrunksDialplanReload
 * @package Core\Infrastructure\Service\XmlRpc
 */
class RequestProxyTrunksDialplanReload extends AbstractXmlRpcRequest
{
    protected function getProxyServers()
    {
        return [
            'proxytrunks' => 'dispatcher.reload',
        ];
    }
}