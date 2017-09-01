<?php
namespace Ivoz\Domain\Service\LcrRule;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\LcrRule\LcrRule;
use Ivoz\Domain\Model\LcrRule\LcrRuleInterface;
use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;
use Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface;

/**
 * Class UpdateByOutgoingRouting
 * @package Ivoz\Domain\Service\LcrRule
 */
class UpdateByOutgoingRouting
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

    public function execute(OutgoingRoutingInterface $outgoingRouting)
    {
        // If edit, delete everything and fresh-start
        $lcrRules = $outgoingRouting->getLcrRules();
        foreach ($lcrRules as $lcrRule) {
            $this->entityPersister->remove($lcrRule);
        }

        /**
         * @var LcrRuleInterface[] $lcrRules
         */
        $lcrRules = array();
        // Create LcrRule for each RoutingPattern
        if ($outgoingRouting->getType() === 'group') {
            $patterns = $outgoingRouting->getRoutingPatternGroup()->getRoutingPatterns();
            foreach ($patterns as $pattern) {
                $lcrRule = $this->addLcrRulePerPattern(
                    $outgoingRouting,
                    $pattern
                );
                array_push($lcrRules, $lcrRule);
            }
        } elseif ($outgoingRouting->getType() === 'pattern') {
            $lcrRule = $this->addLcrRulePerPattern(
                $outgoingRouting,
                $outgoingRouting->getRoutingPattern()
            );
            array_push($lcrRules, $lcrRule);
        } elseif ($outgoingRouting->getType() === 'fax') {
            $lcrRule = $this->addLcrRulePerPattern(
                $outgoingRouting
            );
            array_push($lcrRules, $lcrRule);
        } else {

            throw new \Exception('Incorrect Outgoing Routing Type');
        }
    }

    /**
     * @todo this can be a service itself
     * @param OutgoingRoutingInterface $entity
     * @param RoutingPatternInterface|null $pattern
     * @return LcrRuleInterface
     */
    protected function addLcrRulePerPattern(
        OutgoingRoutingInterface $entity,
        RoutingPatternInterface $pattern=null
    ) {
        $lcrRuleDto = LcrRule::createDTO();
        $condition = 'fax';
        if (is_null($pattern)) {
            // Fax route
            $lcrRuleDto
                ->setTag('fax')
                ->setDescription('Special route for fax');
        } else {
            // Non-fax route
            $lcrRuleDto
                ->setTag($pattern->getName())
                ->setDescription($pattern->getDescription())
                ->setRoutingPatternId($pattern->getId());

            $condition = $pattern->getRegExp();
        }

        $lcrRule = LcrRule::fromDTO($lcrRuleDto);
        $lcrRule->setCondition($condition);

        // Setting Outgoing Routing also sets from_uri (see model)
        $lcrRule->setOutgoingRouting($entity);

        /**
         * @todo this makes no sense, we probably should add a method to persist new entities directly
         */
        return $this
            ->entityPersister
            ->persist($lcrRule->toDTO());
    }

}