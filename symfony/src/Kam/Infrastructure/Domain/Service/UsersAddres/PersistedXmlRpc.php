<?php

namespace Kam\Domain\Service\UsersAddres;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Kam\Domain\Model\UsersAddres\UsersAddresInterface;

/**
 * Class PersistedSendXmlRcp
 * @package Kam\Domain\Service\UsersAddres
 * @lifecycle post_persist
 */
class PersistedSendXmlRcp extends AbstractSendXmlRcp
{
    public function execute(UsersAddresInterface $entity)
    {

        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Authorized source may have been saved.</p>';
            throw new \Exception($message);
        }
    }
}