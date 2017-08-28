<?php

namespace Ivoz\Domain\Service\Company;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReload;
use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersDomainReload;
use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersPermissionsAddressReload;
use Ivoz\Domain\Model\Company\CompanyInterface;

abstract class AbstractSendXmlRcp implements CompanyLifecycleEventHandlerInterface
{
    protected $lcrReload;
    protected $domainReload;
    protected $addressReload;

    public function __construct(
        RequestProxyTrunksLcrReload $lcrReload,
        RequestProxyUsersDomainReload $domainReload,
        RequestProxyUsersPermissionsAddressReload $addressReload
    ) {
        $this->lcrReload = $lcrReload;
        $this->domainReload = $domainReload;
        $this->addressReload = $addressReload;
    }

    public function execute(CompanyInterface $entity)
    {
        $this->xmlRpcService->send();
        $this->domainReload->send();
        $this->addressReload->send();
    }
}