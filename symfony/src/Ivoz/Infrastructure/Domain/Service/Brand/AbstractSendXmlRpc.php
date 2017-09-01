<?php

namespace Ivoz\Infrastructure\Domain\Service\Brand;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReload;
use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersDomainReload;
use Ivoz\Domain\Model\Brand\BrandInterface;
use Ivoz\Domain\Service\Brand\BrandLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements BrandLifecycleEventHandlerInterface
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

    public function execute(BrandInterface $entity, $isNew)
    {
        $this->xmlRpcService->send();
        $this->domainReload->send();
    }
}