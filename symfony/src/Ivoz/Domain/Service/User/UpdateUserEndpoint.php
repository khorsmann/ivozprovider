<?php

namespace Ivoz\Domain\Service\User;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\Extension\ExtensionInterface;
use Ivoz\Domain\Model\User\User;
use Ivoz\Domain\Model\User\UserInterface;
use Ivoz\Domain\Model\User\UserRepository;
use Ivoz\Domain\Service\Extension\ExtensionLifecycleEventHandlerInterface;

/**
 * Class UpdateUserEndpoint
 * @todo trigger this automatically within the entity
 * @package Ivoz\Domain\Service\User
 * @lifecycle pre_persist
 */
class UpdateUserEndpoint implements UserLifecycleEventHandlerInterface
{

    public function __construct() {}

    public function execute(UserInterface $entity, $isNew)
    {
        $entity->updateEndpoint();
    }
}