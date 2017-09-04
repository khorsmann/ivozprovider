<?php

namespace Ivoz\Infrastructure\Domain\Service\TransformationRulesetGroupsTrunk;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksDialplanReload;
use Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface;
use Ivoz\Domain\Service\TransformationRulesetGroupsTrunk\PickUpRelUserLifecycleEventHandlerInterface;
use Ivoz\Domain\Service\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements TransformationRulesetGroupsTrunkLifecycleEventHandlerInterface
{
    protected $trunksDialplanReload;

    public function __construct(
        RequestProxyTrunksDialplanReload $trunksDialplanReload
    ) {
        $this->trunksDialplanReload = $trunksDialplanReload;
    }

    public function execute(TransformationRulesetGroupsTrunkInterface $entity, $isNew)
    {
        $this->trunksDialplanReload->send();
    }
}