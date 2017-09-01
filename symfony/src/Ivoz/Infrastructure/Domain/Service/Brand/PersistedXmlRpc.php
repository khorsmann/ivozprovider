<?php

namespace Ivoz\Infrastructure\Domain\Service\Brand;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\Domain\Model\Brand\BrandInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Ivoz\Domain\Service\Brand
 * @lifecycle post_persist
 */
class PersistedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(BrandInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Brand may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}