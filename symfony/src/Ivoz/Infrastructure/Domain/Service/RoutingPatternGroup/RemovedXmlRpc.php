<?php

namespace Ivoz\Infrastructure\RoutingPatternGroup\Service\RoutingPatternGroup;

use Core\Infrastructure\RoutingPatternGroup\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\RoutingPatternGroup\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Ivoz\RoutingPatternGroup\Service\RoutingPatternGroup
 * @lifecycle post_remove
 */
class RemovedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(RoutingPatternGroupInterface $entity, $isNew)
    {
        $outgoingRoutings = $entity->getOutgoingRoutings();
        if (empty($outgoingRoutings)) {
            return;
        }

        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Routing pattern group may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}