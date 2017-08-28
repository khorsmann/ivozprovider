<?php

namespace Ivoz\Domain\Service\Invoice;

use Ivoz\Domain\Model\Invoice\InvoiceInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\Invoice
 * @lifecycle pre_persist
 */
class SanitizeValues implements InvoiceLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(InvoiceInterface $entity)
    {
        if (is_null($entity->getStatus())) {
            $entity->setStatus("waiting");
        }
    }
}