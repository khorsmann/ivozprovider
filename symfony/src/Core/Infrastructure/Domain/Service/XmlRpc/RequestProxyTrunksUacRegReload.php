<?php

namespace Core\Infrastructure\Domain\Service\XmlRpc;

/**
 * Class RequestProxyTrunksUacRegReload
 * @package Core\Infrastructure\Service\XmlRpc
 */
class RequestProxyTrunksUacRegReload extends AbstractXmlRpcRequest
{
    protected function getProxyServers()
    {
        return [
            'proxytrunks' => 'uac.reg_reload',
        ];
    }
}