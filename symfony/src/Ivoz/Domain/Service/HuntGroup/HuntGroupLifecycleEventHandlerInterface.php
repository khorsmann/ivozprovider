<?php

namespace Ivoz\Domain\Service\HuntGroup;

use Ivoz\Domain\Model\HuntGroup\HuntGroupInterface;

interface HuntGroupLifecycleEventHandlerInterface
{
    public function execute(HuntGroupInterface $entity);
}