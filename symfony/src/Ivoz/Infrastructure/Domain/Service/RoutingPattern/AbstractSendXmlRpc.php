<?php

namespace Ivoz\Infrastructure\RoutingPattern\Service\RoutingPattern;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReload;
use Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface;
use Ivoz\Domain\Service\RoutingPattern\PickUpRelUserLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements PickUpRelUserLifecycleEventHandlerInterface
{
    protected $trunksLcrReload;

    public function __construct(
        RequestProxyTrunksLcrReload $trunksLcrReload
    ) {
        $this->trunksLcrReload = $trunksLcrReload;
    }

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

        $this->trunksLcrReload->send();
    }
}