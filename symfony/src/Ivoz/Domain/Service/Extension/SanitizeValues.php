<?php

namespace Ivoz\Domain\Service\Extension;

use Ivoz\Domain\Model\Extension\ExtensionInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\Extension
 * @lifecycle pre_persist
 */
class SanitizeValues implements ExtensionLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    public function __construct(
        EntityPersisterInterface $entityPersister
    ) {
        $this->entityPersister = $entityPersister;
    }

    /**
     * @throws \Exception
     */
    public function execute(ExtensionInterface $entity)
    {
        $nullableFields = array(
            "IvrCommon"     => "IvrCommon",
            "IvrCustom"     => "IvrCustom",
            "huntGroup"     => "huntGroup",
            "user"          => "user",
            "conferenceRoom" => "conferenceRoom",
            "number"        => "numberValue",
            "friend"        => "friendValue",
            "queue"         => "queue",
        );

        $routeType = $entity->getRouteType();
        foreach ($nullableFields as $type => $fieldName) {
            if ($routeType == $type) {
                continue;
            }

            $setter = "set" . ucfirst($fieldName);
            $entity->{$setter}(null);
        }
    }
}
