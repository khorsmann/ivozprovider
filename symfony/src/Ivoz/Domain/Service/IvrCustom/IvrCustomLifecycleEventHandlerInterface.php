<?php

namespace Ivoz\Domain\Service\IvrCustom;

use Ivoz\Domain\Model\IvrCustom\IvrCustomInterface;

interface IvrCustomLifecycleEventHandlerInterface
{
    public function execute(IvrCustomInterface $entity, $isNew);
}