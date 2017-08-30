<?php

namespace Kam\Infrastructure\Domain\Service\UsersAddres;

use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersAddresReload;
use Core\Infrastructure\Domain\Service\XmlRpc\RequestProxyUsersPermissionsAddressReload;
use Kam\Domain\Model\UsersAddres\UsersAddresInterface;
use Kam\Domain\Service\UsersAddres\UsersAddresLifecycleEventHandlerInterface;

abstract class AbstractSendXmlRpc implements UsersAddresLifecycleEventHandlerInterface
{
    /**
     * @var RequestProxyUsersPermissionsAddressReload
     */
    protected $usersPermissionsAddressReload;

    public function __construct(
        RequestProxyUsersPermissionsAddressReload $usersPermissionsAddressReload
    ) {
        $this->usersPermissionsAddressReload = $usersPermissionsAddressReload;
    }

    public function execute(UsersAddresInterface $entity)
    {
        $this->usersPermissionsAddressReload->send();
    }
}