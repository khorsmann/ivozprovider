<?php

namespace Ivoz\Domain\Model\User;

/**
 * User
 */
class User extends UserAbstract implements UserInterface
{
    use UserTrait;

    /**
     * return associated endpoint with the user
     *
     * @return \Ast\Domain\Model\PsEndpoint\PsEndpointInterface
     */
    public function getEndpoint()
    {
        $terminal = $this->getTerminal();
        if (!$terminal) {
            return null;
        }

        $endpoints = $terminal->getAstPsEndpoints();
        return array_shift($endpoints);
    }
}

