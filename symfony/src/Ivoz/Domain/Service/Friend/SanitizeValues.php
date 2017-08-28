<?php

namespace Ivoz\Domain\Service\Friend;

use Ivoz\Domain\Model\Friend\FriendInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\Friend
 * @lifecycle pre_persist
 */
class SanitizeValues implements FriendLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(FriendInterface $entity)
    {
        $entity->setDomain(
            $entity
                ->getCompany()
                ->getDomainUsers()
        );
    }
}
