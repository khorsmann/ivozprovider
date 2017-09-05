<?php

namespace Ivoz\Domain\Service\User;

use Ivoz\Domain\Model\User\UserInterface;

/**
 * Class CryptPass
 * @package Ivoz\Domain\Service\User
 * @lifecycle pre_persist
 */
class CryptPass implements UserLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(UserInterface $entity, $isNew)
    {
        // Nice pass for nice users
        $pass = $entity->hasChanged('pass');
        if ($pass) {
            $passPlain = $entity->getPass();
            if (!empty($passPlain)) {
                $newToken = md5(md5($passPlain));
                $entity->setTokenKey($newToken);

                $salt = $this->_salt();
                $ret = crypt(
                    $entity->getPass(),
                    '$5$rounds=5000$' . $salt . '$'
                );
                $entity->setPass($ret);
                /**
                 * @todo implement logger system
                 */
                // $this->_logger->log("Password set", \Zend_Log::INFO);
            }
        }
    }
}