<?php

namespace Ivoz\Domain\Service\Domain;

use Ivoz\Domain\Model\Domain\DomainInterface;

interface DomainLifecycleEventHandlerInterface
{
    public function execute(DomainInterface $entity);
}