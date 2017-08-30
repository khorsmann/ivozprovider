<?php

namespace Ivoz\Infrastructure\Domain\Service\Domain;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\Domain\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\Domain\DomainInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Ivoz\Domain\Service\Domain
 * @lifecycle post_persist
 */
class PersistedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(DomainInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Domain may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}