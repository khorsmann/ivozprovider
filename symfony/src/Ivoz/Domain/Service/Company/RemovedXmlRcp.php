<?php

namespace Ivoz\Domain\Service\Company;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\Domain\Model\Company\CompanyInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Ivoz\Domain\Service\Company
 * @lifecycle post_remove
 */
class RemovedSendXmlRcp extends AbstractSendXmlRcp
{
    public function execute(CompanyInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Company may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}