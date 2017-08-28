<?php

namespace Kam\Domain\Service\Rtpproxy;

use Core\Domain\Service\LifecycleEventHandlerInterface;
use Kam\Domain\Model\Rtpproxy\RtpproxyInterface;

/**
 * Class SanitizeValues
 * @package Kam\Domain\Service\Rtpproxy
 * @lifecycle pre_persist
 */
class SanitizeValues implements RtpproxyLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(RtpproxyInterface $entity)
    {
        $entity->setSetid(
            $entity->getMediaRelaySet()->getId()
        );
    }
}