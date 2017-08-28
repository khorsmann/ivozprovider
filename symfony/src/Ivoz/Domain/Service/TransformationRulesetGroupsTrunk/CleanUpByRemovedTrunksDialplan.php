<?php
namespace Ivoz\Domain\Service\TransformationRulesetGroupsTrunk;

use Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkRepository;
use Kam\Domain\Model\TrunksDialplan\TrunksDialplanInterface;
use Kam\Domain\Service\TrunksDialplan\TrunksDialplanLifecycleEventHandlerInterface;

class CleanUpByRemovedTrunksDialplan implements TrunksDialplanLifecycleEventHandlerInterface
{
    /**
     * @var TransformationRulesetGroupsTrunkRepository
     */
    protected $transformationRepository;

    public function __construct(
        TransformationRulesetGroupsTrunkRepository $transformationRepository
    ) {
        $this->transformationRepository = $transformationRepository;
    }

    public function execute(TrunksDialplanInterface $entity)
    {
        $dpid = $entity->getDpid();
        $transformationRulesetGroupsTrunksId = $entity
            ->getTransformationRulesetGroupsTrunk()
            ->getId();

        $criteria = [
            'dpid' => $dpid,
            'transformationRulesetGroupsTrunk' => $transformationRulesetGroupsTrunksId
        ];

        $nRemaining = $this->transformationRepository->countByCriteria($criteria);
        if ($nRemaining != 0) {
            return;
        }

        $transformationRulesetGroupsTrunk = $entity->getTransformationRulesetGroupsTrunk();
        $targetFields = [
            'callerIn',
            'callerOut',
            'calleeIn',
            'calleeOut'
        ];

        foreach ($targetFields as $field) {
            $getter = 'get' . ucfirst($field);
            $setter = 'set' . ucfirst($field);

            if ($transformationRulesetGroupsTrunk->{$getter}() == $dpid) {
                $transformationRulesetGroupsTrunk->{$setter}(null);
            }
        }
    }
}