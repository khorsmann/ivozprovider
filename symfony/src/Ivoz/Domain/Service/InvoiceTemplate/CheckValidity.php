<?php

namespace Ivoz\Domain\Service\InvoiceTemplate;

use Ivoz\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface;

/**
 * Class CheckValidity
 * @package Ivoz\Domain\Service\InvoiceTemplate
 * @lifecycle pre_persist
 */
class CheckValidity implements InvoiceTemplateLifecycleEventHandlerInterface
{
    public function __construct() {}

    /**
     * @throws \Exception
     */
    public function execute(InvoiceTemplateInterface $entity)
    {
        if (empty($entity->getTemplate())) {
            throw new \Exception("Template not null", 80000);
        }
    }
}