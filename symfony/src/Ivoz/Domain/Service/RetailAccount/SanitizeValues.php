<?php

namespace Ivoz\Domain\Service\RetailAccount;

use Core\Domain\Service\LifecycleEventHandlerInterface;
use Ivoz\Domain\Model\RetailAccount\RetailAccountInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\RetailAccount
 * @lifecycle pre_persist
 */
class SanitizeValues implements RoutingPatternGroupLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(RetailAccountInterface $entity, $isNew)
    {
        /**
         * @todo rewrite this
         */
        // Set account domain to its brand domain
        $entity->setDomain(
            $entity
                ->getCompany()
                ->getBrand()
                ->getDomainUsers()
        );
    }
}