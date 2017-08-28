<?php

namespace Ivoz\Domain\Service\Fax;

use Ivoz\Domain\Model\Fax\FaxInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\Fax
 * @lifecycle pre_persist
 */
class SanitizeValues implements FaxLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(FaxInterface $entity)
    {
        // @todo move this to the entity
        if ($entity->getSendByEmail() == 0) {
            $entity->setEmail(null);
        }
    }
}
