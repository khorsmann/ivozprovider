<?php

namespace Ivoz\Domain\Service\Queue;

use Ivoz\Domain\Model\Queue\QueueInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\Queue
 * @lifecycle pre_persist
 */
class SanitizeValues implements QueueLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(QueueInterface $entity, $isNew)
    {
        /**
         * @todo Check whether we can just keep zero valur
         */
        // Jquery UI Spinner doesn't allow null values
        if ($entity->getMaxWaitTime() == 0) {
            $entity->setMaxWaitTime(null);
        }

        if ($entity->getMaxlen() == 0) {
            $entity->setMaxlen(null);
        }
    }
}