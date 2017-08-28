<?php

namespace Ivoz\Domain\Service\Domain;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersDomainReload;
use Ivoz\Domain\Model\Domain\DomainInterface;

abstract class AbstractSendXmlRcp implements ApplicationServerLifecycleEventHandlerInterface
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