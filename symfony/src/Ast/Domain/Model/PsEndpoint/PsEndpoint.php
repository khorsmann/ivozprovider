<?php

namespace Ast\Domain\Model\PsEndpoint;

use Core\Application\DataTransferObjectInterface;
use Ivoz\Domain\Model\User\UserInterface;

/**
 * PsEndpoint
 */
class PsEndpoint extends PsEndpointAbstract implements PsEndpointInterface
{
    use PsEndpointTrait;

    /**
     * @deprecated
     * @todo
     * @throws \Exception
     */
    public function getAstPsAor()
    {
        Throw new \Exception('To be re-thinked');
    }


    /**
     * Update this user endpoint with current model data
     */
    public function updateByUser(UserInterface $user)
    {
        // Update the endpoint
        $endpoint = $this->getEndpoint();
        if ($endpoint) {
            $endpoint->setPickupGroup($this->getPickUpGroupsIds())
                ->setCallerid(sprintf("%s <%s>", $this->getFullName(), $this->getExtensionNumber()))
                ->setMailboxes($this->getVoiceMail())
                ->save();
        }


        /**
         * @todo move this to a service
         */
        throw new \Exception('Not implemented yet');
        // Update the endpoint
        $endpoint = $this->getEndpoint();
        if ($endpoint) {
            $endpoint
                ->setPickupGroup($this->getPickUpGroupsIds())
                ->setCallerid(sprintf("%s <%s>", $this->getFullName(), $this->getExtensionNumber()))
                ->setMailboxes($this->getVoiceMail())
                ->save();
        }
    }
}

