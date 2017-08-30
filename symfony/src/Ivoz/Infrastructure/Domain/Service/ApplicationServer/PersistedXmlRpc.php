<?php

namespace Ivoz\Infrastructure\Domain\Service\ApplicationServer;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Ivoz\Domain\Service\ApplicationServer
 * @lifecycle post_persist
 */
class PersistedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(ApplicationServerInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Application Server may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}