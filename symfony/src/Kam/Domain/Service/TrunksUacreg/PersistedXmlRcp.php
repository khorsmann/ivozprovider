<?php

namespace Kam\Domain\Service\trustedReload;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Kam\Domain\Model\TrunksUacreg\TrunksUacregInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Kam\Domain\Service\trustedReload
 * @lifecycle post_persist
 */
class PersistedSendXmlRcp extends AbstractSendXmlRcp
{
    public function execute(TrunksUacregInterface $entity)
    {

        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Sip registy may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}