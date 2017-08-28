<?php

namespace Kam\Domain\Service\TrunksUacreg;

use Core\Domain\Service\LifecycleEventHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Kam\Domain\Model\TrunksUacreg\TrunksUacregInterface;

/**
 * Class SanitizeValues
 * @package Kam\Domain\Service\TrunksUacreg
 * @lifecycle pre_persist
 */
class SanitizeValues implements TrunksUacregLifecycleEventHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function execute(TrunksUacregInterface $entity)
    {
        if (empty($entity->getAuthUsername())) {
            $entity->setAuthUsername($entity->getRUsername());
        }

        if (empty($entity->getAuthProxy())) {
            $entity->setAuthProxy('sip:' . $entity->getRDomain());
        }

        $alreadyPersisted = $this->em->contains($entity);

        // Multi-DDI support
        if (!$entity->getMultiDdi()) {
            return;
        }

        $multiDDI_is_enabled_in_new_item = !$alreadyPersisted; # New item
        $multiDDI_has_been_enabled = $alreadyPersisted && $entity->hasChanged('multiDDI'); # Existing item
        if ($multiDDI_has_been_enabled || $multiDDI_is_enabled_in_new_item) {
            $entity->setLUuid(round(microtime(true) * 1000));
        }
    }
}