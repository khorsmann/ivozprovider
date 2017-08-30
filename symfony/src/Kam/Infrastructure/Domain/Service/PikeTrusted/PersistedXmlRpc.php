<?php

namespace Kam\Domain\Service\PikeTrusted;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Kam\Domain\Model\PikeTrusted\PikeTrustedInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Kam\Domain\Service\PikeTrusted
 * @lifecycle post_persist
 */
class PersistedSendXmlRcp extends AbstractSendXmlRcp
{
    public function execute(PikeTrustedInterface $entity)
    {

        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Trusted source may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}