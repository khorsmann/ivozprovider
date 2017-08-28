<?php

namespace Ivoz\Domain\Service\GenericMusicOnHold;

use Core\Domain\Service\LifecycleEventHandlerInterface;
use Core\Domain\Model\EntityInterface;
use Ivoz\Domain\Model\GenericMusicOnHold\GenericMusicOnHold;
use Ivoz\Domain\Model\GenericMusicOnHold\GenericMusicOnHoldInterface;
use \IvozProvider\Gearmand\Jobs;

/**
 * Class Recoder
 * @package Ivoz\Domain\Service\GenericMusicOnHold
 * @lifecycle post_persist
 */
class Recoder implements GenericMusicOnHoldLifecycleEventHandlerInterface
{
    /**
     * @var Jobs\Recoder
     */
    protected $recoder;

    public function __construct(
        Jobs\Recoder $recoder
    ) {
        $this->recoder = $recoder;
    }

    public function execute(GenericMusicOnHoldInterface $entity)
    {
        /**
         * @todo
         */
        throw new \Exception('Not implemented yet');

        $mustRecode = false;

        if ($mustRecode) {
            $recoderJob = new Recoder();
            $this
                ->recoder
                ->setId($entity->getId())
                ->setModelName("GenericMusicOnHold")
                ->send();
        }
    }
}
