<?php

namespace Kam\Domain\Service\TrunksUacreg;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Kam\Domain\Model\TrunksUacreg\TrunksUacregInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Kam\Domain\Service\TrunksUacreg
 * @lifecycle post_remove
 */
class RemovedSendXmlRcp extends AbstractSendXmlRcp
{
    public function execute(TrunksUacregInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Sip registy may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}