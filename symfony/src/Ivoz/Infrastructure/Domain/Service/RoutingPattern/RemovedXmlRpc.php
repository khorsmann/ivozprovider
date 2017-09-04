<?php

namespace Ivoz\Infrastructure\RoutingPattern\Service\RoutingPattern;

use Core\Infrastructure\RoutingPattern\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\RoutingPattern\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Ivoz\RoutingPattern\Service\RoutingPattern
 * @lifecycle post_remove
 */
class RemovedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(RoutingPatternInterface $entity, $isNew)
    {
        // If any LcrRule uses this Pattern, update accordingly
        /**
         * @var LcrRuleInterface[] $lcrRules
         */
        $lcrRules = $entity->getLcrRules();

        if (empty($lcrRules)) {
            return;
        }

        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Routing pattern may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}