<?php

namespace Kam\Domain\Service\TrunksDialplan;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Kam\Domain\Model\TrunksDialplan\TrunksDialplanInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Kam\Domain\Service\TrunksDialplan
 * @lifecycle post_remove
 */
class RemovedSendXmlRcp extends AbstractSendXmlRcp
{
    public function execute(TrunksDialplanInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Kam Trunks may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}