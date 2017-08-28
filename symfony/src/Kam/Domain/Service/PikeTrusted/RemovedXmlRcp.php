<?php

namespace Kam\Domain\Service\PikeTrusted;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Kam\Domain\Model\PikeTrusted\PikeTrustedInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Kam\Domain\Service\PikeTrusted
 * @lifecycle post_remove
 */
class RemovedSendXmlRcp extends AbstractSendXmlRcp
{
    public function execute(PikeTrustedInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Trusted source may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}