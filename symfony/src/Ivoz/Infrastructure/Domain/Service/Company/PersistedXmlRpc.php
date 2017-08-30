<?php

namespace Ivoz\Infrastructure\Domain\Service\Company;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\Domain\Model\Company\CompanyInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Ivoz\Domain\Service\Company
 * @lifecycle post_persist
 */
class PersistedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(CompanyInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Company may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}