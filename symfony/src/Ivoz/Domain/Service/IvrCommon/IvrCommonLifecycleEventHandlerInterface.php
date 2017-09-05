<?php

namespace Ivoz\Domain\Service\IvrCommon;

use Ivoz\Domain\Model\IvrCommon\IvrCommonInterface;

interface IvrCommonLifecycleEventHandlerInterface
{
    public function execute(IvrCommonInterface $entity, $isNew);
}