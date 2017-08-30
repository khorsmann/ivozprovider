<?php

namespace Kam\Domain\Service\UsersAddres;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Kam\Domain\Model\UsersAddres\UsersAddresInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Kam\Domain\Service\UsersAddres
 * @lifecycle post_remove
 */
class RemovedSendXmlRcp extends AbstractSendXmlRcp
{
    public function execute(UsersAddresInterface $entity)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Authorized source may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}