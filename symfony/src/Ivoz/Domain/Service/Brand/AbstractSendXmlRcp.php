<?php

namespace Ivoz\Domain\Service\Brand;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReload;
use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersDomainReload;
use Ivoz\Domain\Model\Brand\BrandInterface;

abstract class AbstractSendXmlRcp implements BrandLifecycleEventHandlerInterface
{
    protected $lcrReload;
    protected $domainReload;

    public function __construct(
        RequestProxyTrunksLcrReload $lcrReload,
        RequestProxyUsersDomainReload $domainReload
    ) {
        $this->lcrReload = $lcrReload;
        $this->domainReload = $domainReload;
    }

    public function execute(BrandInterface $entity)
    {
        $this->xmlRpcService->send();
        $this->domainReload->send();
    }
}