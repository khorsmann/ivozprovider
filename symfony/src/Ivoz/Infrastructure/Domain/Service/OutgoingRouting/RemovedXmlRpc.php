<?php

namespace Ivoz\Infrastructure\OutgoingRouting\Service\OutgoingRouting;

use Core\Infrastructure\OutgoingRouting\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\OutgoingRouting\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Ivoz\OutgoingRouting\Service\OutgoingRouting
 * @lifecycle post_remove
 */
class RemovedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(OutgoingRoutingInterface $entity, $isNew)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>LCR Gateways may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}