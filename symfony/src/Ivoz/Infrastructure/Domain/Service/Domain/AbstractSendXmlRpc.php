<?php

namespace Ivoz\Infrastructure\Domain\Service\Domain;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersDomainReload;
use Ivoz\Domain\Model\Domain\DomainInterface;
use Ivoz\Domain\Service\ApplicationServer\ApplicationServerLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements ApplicationServerLifecycleEventHandlerInterface
{
    protected $domainReload;

    public function __construct(
        RequestProxyUsersDomainReload $domainReload
    ) {
        $this->domainReload = $domainReload;
    }

    public function execute(DomainInterface $entity)
    {
        $this->domainReload->send();
    }
}