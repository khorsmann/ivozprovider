<?php

namespace Ivoz\Domain\Service\Domain;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\Domain\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\Domain\DomainInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Ivoz\Domain\Service\Domain
 * @lifecycle post_remove
 */
class RemovedSendXmlRcp extends AbstractSendXmlRcp
{
    public function execute(DomainInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Domain may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}