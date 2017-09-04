<?php

namespace Kam\Domain\Service\TrunksDialplan;

use Core\Domain\Service\EntityPersisterInterface;
use Core\Domain\Service\LifecycleEventHandlerInterface;
use Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface;
use Ivoz\Domain\Service\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkLifecycleEventHandlerInterface;

/**
 * Class CreateCallerOutRules
 * @package Kam\Domain\Service\TrunksDialplan
 * @lifecycle pre_persist
 */
class CreateCallerOutRules implements TransformationRulesetGroupsTrunkLifecycleEventHandlerInterface
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
            "^$cc([0-9]+)$",
            '\1',
            1,
            'E.164 to national',
            $model->getCallerOut()
        );
        $this->entityPersister->persist($dto);

        $dto = $this->createDialplanRuleDtoByTransformationRulesetGroupsTrunk(
            $entity,
            '^([0-9]+)$',
            $intcode . '\1',
            2,
            'E.164 to international',
            $model->getCallerOut()
        );
        $this->entityPersister->persist($dto);
    }
}