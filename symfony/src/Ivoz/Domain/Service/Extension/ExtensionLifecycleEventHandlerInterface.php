<?php

namespace Ivoz\Domain\Service\Extension;

use Ivoz\Domain\Model\Extension\ExtensionInterface;

interface ExtensionLifecycleEventHandlerInterface
{
    public function execute(ExtensionInterface $entity, $isNew);
}