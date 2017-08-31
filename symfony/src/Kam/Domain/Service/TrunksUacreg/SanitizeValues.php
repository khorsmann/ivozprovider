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
    public function __construct() {}

    public function execute(TrunksUacregInterface $entity, $isNew)
    {
        if (empty($entity->getAuthUsername())) {
            $entity->setAuthUsername($entity->getRUsername());
        }

        if (empty($entity->getAuthProxy())) {
            $entity->setAuthProxy('sip:' . $entity->getRDomain());
        }

        // Multi-DDI support
        if (!$entity->getMultiDdi()) {
            return;
        }

        $multiDDI_is_enabled_in_new_item = $isNew; # New item
        $multiDDI_has_been_enabled = !$isNew && $entity->hasChanged('multiDDI'); # Existing item
        if ($multiDDI_has_been_enabled || $multiDDI_is_enabled_in_new_item) {
            $entity->setLUuid(round(microtime(true) * 1000));
        }
    }
}