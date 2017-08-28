<?php

namespace Ivoz\Domain\Service\Brand;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\Domain\Model\Brand\BrandInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Ivoz\Domain\Service\Brand
 * @lifecycle post_remove
 */
class RemovedSendXmlRcp extends AbstractSendXmlRcp
{
    public function execute(BrandInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Brand may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}