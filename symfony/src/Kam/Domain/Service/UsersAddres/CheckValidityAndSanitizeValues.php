<?php

namespace Kam\Domain\Service\UsersAddres;

use Core\Domain\Service\LifecycleEventHandlerInterface;
use Kam\Domain\Model\UsersAddres\UsersAddresInterface;

/**
 * Class CheckValidityAndSanitizeValues
 * @package Kam\Domain\Service\UsersAddres
 * @lifecycle pre_persist
 */
class CheckValidityAndSanitizeValues implements UsersAddresLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(UsersAddresInterface $entity)
    {
        $address = explode('/', $entity->getSourceAddress());
        $ip = array_shift($address);
        $mask = array_shift($address);

        // Validate IP
        if (!filter_var($ip, FILTER_VALIDATE_IP, array(FILTER_FLAG_IPV4))) {
            throw new \Exception('Invalid IP address, discarding value.', 70000);
        }

        // Validate mask
        if (is_null($mask)) {
            $mask = 32;
        } else {
            if (!is_numeric($mask) || $mask < 0 || $mask > 32) {
                throw new \Exception('Wrong mask, discarding value.', 70001);
            }
        }

        // Save validated values
        $entity->setIpAddr($ip);
        $entity->setMask($mask);
    }
}