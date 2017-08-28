<?php

namespace Ivoz\Domain\Service\GenericMusicOnHold;

use Ivoz\Domain\Model\GenericMusicOnHold\GenericMusicOnHoldInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\GenericMusicOnHold
 * @lifecycle pre_persist
 */
class SanitizeValues implements GenericMusicOnHoldLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(GenericMusicOnHoldInterface $entity)
    {
        throw new \Exception('Not implemented yet');

//        $mustRecode = false;
//
//        $fso = $model->fetchOriginalFile(false);
//
//        if ($fso instanceof \Iron_Model_Fso && $fso->mustFlush()) {
//            $mustRecode = true;
//            $model->setStatus('pending');
//        }
    }
}
