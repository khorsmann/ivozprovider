<?php

namespace Ivoz\Domain\Service\DDI;

use Ivoz\Domain\Model\Country\Country;
use Ivoz\Domain\Model\DDI\DDIInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\DDI
 * @lifecycle pre_persist
 */
class SanitizeValues implements DDILifecycleEventHandlerInterface
{
    public function __construct() {}

    /**
     * @throws \Exception
     */
    public function execute(DDIInterface $entity)
    {
        /**
         * @todo review this
         */
        $nullableFields = array(
            'user'          => 'userId',
            'IvrCommon'     => 'IvrCommonId',
            'IvrCustom'     => 'IvrCustomId',
            'huntGroup'     => 'huntGroupId',
            'fax'           => 'faxId',
            'friend'        => 'friendValue',
            'conferenceRoom' => 'conferenceRoomId',
            'queue'         => 'queueId',
        );

        $routeType = $entity->getRouteType();
        foreach ($nullableFields as $type => $fieldName) {
            if ($routeType == $type) {
                continue;
            }

            $setter = 'set' . ucfirst($fieldName);
            $entity->{$setter}(null);
        }

        /**
         * Set standarized E164 number
         * @todo FIXME Country IS MANDATODY
         * @var Country $country
         */
        $country = $entity->getCountry();
        $entity->setDDIE164($country->getCallingCode() . $entity->getDDI());

        // If billInboundCalls is set, peeringContract must have externallyRated to 1
        if (
            $entity->getBillInboundCalls()
            && !$entity->getPeeringContract()->getExternallyRated()
        ) {
            throw new \Exception(
                'Inbound Calls cannot be billed as PeeringContract is not externally rated',
                90000
            );
        }
    }
}