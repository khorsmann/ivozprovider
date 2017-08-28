<?php

namespace Core\Infrastructure\Domain\Service\XmlRpc;

/**
 * Class RequestProxyTrunksDispatcherReload
 * @package Core\Infrastructure\Service\XmlRpc
 */
class RequestProxyTrunksDispatcherReload extends AbstractXmlRpcRequest
{
    public function getProxyServers()
    {
        return [
            'proxytrunks' => 'dispatcher.reload',
        ];
    }
}