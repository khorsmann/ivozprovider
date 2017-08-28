<?php

namespace Kam\Domain\Service\Rtpproxy;

use Kam\Domain\Model\Rtpproxy\RtpproxyInterface;

interface RtpproxyLifecycleEventHandlerInterface
{
    public function execute(RtpproxyInterface $entity);
}