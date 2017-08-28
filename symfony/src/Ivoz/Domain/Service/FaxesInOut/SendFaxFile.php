<?php

namespace Ivoz\Domain\Service\FaxesInOut;

use Core\Infrastructure\Service\Asterisk\ARI\ARIConnector;
use Ivoz\Domain\Model\FaxesInOut\FaxesInOutInterface;

/**
 * Class SendFaxFile
 * @package Ivoz\Domain\Service\FaxesInOut
 * @lifecycle post_persist
 */
class SendFaxFile implements FaxesInOutLifecycleEventHandlerInterface
{
    protected $ariConnector;

    public function __construct(
        ARIConnector $ariConnector
    ) {
        $this->ariConnector = $ariConnector;
    }

    /**
     * @throws \Exception
     */
    public function execute(FaxesInOutInterface $entity)
    {
        $isOutgoingFax = $entity->getType() == "Out";
        $isPending = $entity->getStatus() == "pending";
        $statusHaschanged = $entity->hasChanged("status");

        $mustSendFaxFile = $isOutgoingFax && $statusHaschanged && $isPending;
        if (!$mustSendFaxFile) {
            return;
        }

        try {
            $this->ariConnector->sendFaxfileRequest($entity);
        } catch (\Exception $e) {
            $entity->setStatus('error');

            throw $e;
        }
    }
}