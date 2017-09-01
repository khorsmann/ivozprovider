<?php
namespace Ivoz\Domain\Service\OutgoingRouting;

use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;
use Ivoz\Domain\Service\LcrRule\UpdateByOutgoingRouting;
use Ivoz\Domain\Service\LcrGateway\CreateByOutgoingRouting;

/**
 * Class UpdateLcrEntities
 * @package Ivoz\Domain\Service\OutgoingRouting
 * @lifecycle post_persist
 */
class UpdateLcrEntities implements OutgoingRoutingLifecycleEventHandlerInterface
{
    /**
     * @var UpdateByOutgoingRouting
     */
    protected $updateLcrRuleByOutgoingRouting;

    /**
     * @var CreateByOutgoingRouting
     */
    protected $createLcrGatewayByOutgoingRouting;

    public function __construct(
        UpdateByOutgoingRouting $updateLcrRuleByOutgoingRouting,
        CreateByOutgoingRouting $createLcrGatewayByOutgoingRouting
    ) {
        $this->updateLcrRuleByOutgoingRouting = $updateLcrRuleByOutgoingRouting;
        $this->createLcrGatewayByOutgoingRouting = $createLcrGatewayByOutgoingRouting;
    }

    public function execute(OutgoingRoutingInterface $entity)
    {
        $this->updateLcrRuleByOutgoingRouting->execute($entity);
        $this->createLcrGatewayByOutgoingRouting->execute($entity);
    }
}