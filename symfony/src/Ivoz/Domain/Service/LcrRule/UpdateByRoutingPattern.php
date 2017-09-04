<?php

namespace Ivoz\Domain\Service\LcrRule;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\LcrRule\LcrRuleDTO;
use Ivoz\Domain\Model\LcrRule\LcrRuleInterface;
use Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface;
use Ivoz\Domain\Service\RoutingPattern\RoutingPatternLifecycleEventHandlerInterface;

/**
 * Class UpdateByRoutingPattern
 * @package Ivoz\Domain\Service\LcrRule
 * @lifecycle
 */
class UpdateByRoutingPattern implements RoutingPatternLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    public function __construct(
        EntityPersisterInterface $entityPersister
    ) {
        $this->entityPersister = $this->entityPersister;
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

        foreach ($lcrRules as $lcrRule) {

            $lcrRule->setCondition($entity->getRegExp());

            /**
             * @var LcrRuleDTO $lcrRuleDTO
             */
            $lcrRuleDTO = $lcrRule->toDTO();
            $lcrRuleDTO
                ->setTag($entity->getName())
                ->setDescription($entity->getDescription());

            return $this
                ->entityPersister
                ->persist($lcrRuleDTO, $lcrRule);
        }
    }
}