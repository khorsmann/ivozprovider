<?php
namespace Ivoz\Domain\Service\RoutingPatternGroup;

use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;
use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface;
use Ivoz\Domain\Service\LcrRule\UpdateByOutgoingRouting;
use Ivoz\Domain\Service\LcrGateway\CreateByOutgoingRouting;

/**
 * Class UpdateLcrEntities
 * @package Ivoz\Domain\Service\RoutingPatternGroup
 * @lifecycle post_persist
 */
class UpdateLcrEntities implements RoutingPatternGroupLifecycleEventHandlerInterface
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

    public function execute(RoutingPatternGroupInterface $entity, $isNew)
    {
        if ($isNew) {
            return;
        }

        /**
         * @var OutgoingRoutingInterface[] $outgoingRoutings
         */
        $outgoingRoutings = $entity->getOutgoingRoutings();

        // If any LcrRule uses this PatternGroup, update accordingly
        foreach ($outgoingRoutings as $outgoingRouting) {
            $this->updateLcrRuleByOutgoingRouting->execute($outgoingRouting);
            $this->createLcrGatewayByOutgoingRouting->execute($outgoingRouting);
        }
    }
}