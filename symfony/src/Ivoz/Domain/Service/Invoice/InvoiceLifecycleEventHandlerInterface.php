<?php

namespace Ivoz\Domain\Service\Invoice;

use Ivoz\Domain\Model\Invoice\InvoiceInterface;

interface InvoiceLifecycleEventHandlerInterface
{
    public function execute(InvoiceInterface $entity);
}