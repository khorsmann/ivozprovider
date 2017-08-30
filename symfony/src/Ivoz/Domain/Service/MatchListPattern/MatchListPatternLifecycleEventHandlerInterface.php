<?php

namespace Ivoz\Domain\Service\MatchListPattern;

use Ivoz\Domain\Model\MatchListPattern\MatchListPatternInterface;

interface MatchListPatternLifecycleEventHandlerInterface
{
    public function execute(MatchListPatternInterface $entity);
}