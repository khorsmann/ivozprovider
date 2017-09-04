<?php

namespace Kam\Domain\Service\TrunksDialplan;

use Core\Domain\Service\EntityPersisterInterface;
use Core\Domain\Service\LifecycleEventHandlerInterface;
use Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface;
use Ivoz\Domain\Service\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkLifecycleEventHandlerInterface;

/**
 * Class CreateCalleeInRules
 * @package Kam\Domain\Service\TrunksDialplan
 * @lifecycle pre_persist
 */
class CreateCalleeInRules implements TransformationRulesetGroupsTrunkLifecycleEventHandlerInterface
{
    use CreateDialplanRuleDtoTrait;

    protected $entityPersister;

    public function __construct(
       EntityPersisterInterface $entityPersister
    ) {
        $this->entityPersister = $entityPersister;
    }

    public function execute(TransformationRulesetGroupsTrunkInterface $entity, $isNew)
    {
        $cc = $entity
            ->getCountry()
            ->getCallingCode();
        $intcode = $entity->getInternationalCode();

        $dto = $this->createDialplanRuleDtoByTransformationRulesetGroupsTrunk(
            $entity,
            "^($intcode|\+)([0-9]+)$",
            '\2',
            1,
            'International to E.164',
            $entity->getCalleeIn()
        );
        $this->entityPersister->persist($dto);

        $dto = $this->createDialplanRuleDtoByTransformationRulesetGroupsTrunk(
            $entity,
            '^([0-9]+)$',
            $cc . '\1',
            2,
            'National to E.164',
            $entity->getCalleeIn()
        );
        $this->entityPersister->persist($dto);
    }
}