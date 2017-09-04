<?php

namespace Ivoz\Domain\Model\Terminal;

use Ast\Domain\Model\PsEndpoint\PsEndpointInterface;

/**
 * Terminal
 */
class Terminal extends TerminalAbstract implements TerminalInterface
{
    use TerminalTrait;

    public function getUser()
    {
        return array_shift(
            $this->getUsers()
        );
    }

    /**
     * @return string
     */
    public function getContact()
    {
        return sprintf(
            'sip:%s@%s',
            $this->getName(),
            $this->getDomain()
        );
    }

    /**
     * @return string
     */
    public function getSorcery()
    {
        return sprintf(
            'b%dc%dt%d_%s',
            $this->getCompany()->getBrand()->getId(),
            $this->getCompany()->getId(),
            $this->getId(),
            $this->getName()
        );
    }

    /**
     * @return string
     */
    public function getAllow()
    {
        $allow_audio = $this->getAllowAudio();
        $allow_video = $this->getAllowVideo();

        if (!empty($allow_video)) {
            return $allow_audio . "," . $allow_video;
        }

        return $allow_audio;
    }

    /**
     * @return PsEndpointInterface
     */
    public function getAstPsEndpoint()
    {
        return array_shift(
            $this->getAstPsEndpoints()
        );
    }
}

