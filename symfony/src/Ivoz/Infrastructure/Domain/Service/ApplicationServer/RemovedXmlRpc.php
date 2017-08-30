<?php

namespace Ivoz\Infrastructure\Domain\Service\ApplicationServer;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Ivoz\Domain\Service\ApplicationServer
 * @lifecycle post_remove
 */
class RemovedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(ApplicationServerInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Application Server may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}