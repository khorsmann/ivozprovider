<?php

namespace Ivoz\Infrastructure\OutgoingRouting\Service\OutgoingRouting;

use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Ivoz\OutgoingRouting\Service\OutgoingRouting
 * @lifecycle post_persist
 */
class PersistedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(OutgoingRoutingInterface $entity, $isNew)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>LCR Gateways may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}