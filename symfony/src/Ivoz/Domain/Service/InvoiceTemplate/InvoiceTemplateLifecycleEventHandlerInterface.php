<?php

namespace Ivoz\Domain\Service\InvoiceTemplate;

use Ivoz\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface;

interface InvoiceTemplateLifecycleEventHandlerInterface
{
    public function execute(InvoiceTemplateInterface $entity);
}