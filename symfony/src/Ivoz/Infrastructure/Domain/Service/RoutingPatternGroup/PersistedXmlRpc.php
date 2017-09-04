<?php

namespace Ivoz\Infrastructure\RoutingPatternGroup\Service\RoutingPatternGroup;

use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Ivoz\RoutingPatternGroup\Service\RoutingPatternGroup
 * @lifecycle post_persist
 */
class PersistedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(RoutingPatternGroupInterface $entity, $isNew)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Routing pattern group may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}