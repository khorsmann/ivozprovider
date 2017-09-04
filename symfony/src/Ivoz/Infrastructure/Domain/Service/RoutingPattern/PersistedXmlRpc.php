<?php

namespace Ivoz\Infrastructure\RoutingPattern\Service\RoutingPattern;

use Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Ivoz\RoutingPattern\Service\RoutingPattern
 * @lifecycle post_persist
 */
class PersistedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(RoutingPatternInterface $entity, $isNew)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Routing pattern may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}