<?php

namespace Kam\Domain\Service\TrunksDialplan;

use Core\Domain\Service\LifecycleEventHandlerInterface;
use Kam\Domain\Model\TrunksDialplan\TrunksDialplanInterface;

/**
 * Class SanitizeValues
 * @package Kam\Domain\Service\TrunksDialplan
 * @lifecycle pre_persist
 */
class SanitizeValues implements TrunksDialplanLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(TrunksDialplanInterface $entity)
    {
        /**
         * @todo this logic depends on klear screen and must be redesigned
         */
        throw new \Exception('Mot implemented yet');
    }
}