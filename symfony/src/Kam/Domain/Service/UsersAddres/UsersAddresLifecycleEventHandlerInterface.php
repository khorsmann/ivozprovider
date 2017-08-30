<?php

namespace Kam\Domain\Service\UsersAddres;

use Kam\Domain\Model\UsersAddres\UsersAddresInterface;

interface UsersAddresLifecycleEventHandlerInterface
{
    public function execute(UsersAddresInterface $entity);
}