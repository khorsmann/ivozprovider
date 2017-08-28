<?php

namespace Ivoz\Domain\Service\ExternalCallFilter;

use Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface;

interface ExternalCallFilterLifecycleEventHandlerInterface
{
    public function execute(ExternalCallFilterInterface $entity);
}