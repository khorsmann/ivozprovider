<?php

namespace Ivoz\Domain\Service\RetailAccount;

use Ivoz\Domain\Model\RetailAccount\RetailAccountInterface;

interface RetailAccountLifecycleEventHandlerInterface
{
    public function execute(RetailAccountInterface $entity);
}