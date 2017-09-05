<?php

namespace Ivoz\Domain\Service\Extension;

use Ivoz\Domain\Model\User\UserInterface;
use Ivoz\Domain\Service\User\UserLifecycleEventHandlerInterface;

/**
 * Class UpdateByUser
 * @package Ivoz\Domain\Service\Extension
 * @lifecycle post_persist
 */
class UpdateByUser implements UserLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(UserInterface $entity, $isNew)
    {
        $hasChangedExtension = $entity->hasChanged("extensionId");
        if (!$hasChangedExtension) {
            return;
        }

        // If extension has changed, update extension user

        $extension = $entity->getExtension();
        if ($extension) {
            $extension
                ->setRouteType('user')
                ->setUser($entity);
        }
    }
}