<?php

namespace Ivoz\Domain\Service\Locution;

use Ivoz\Domain\Model\Locution\LocutionInterface;

/**
 * Class SanitizeValues
 * @package Ivoz\Domain\Service\Locution
 * @lifecycle pre_persist
 */
class SanitizeValues implements LocutionLifecycleEventHandlerInterface
{
    public function __construct() {}

    public function execute(LocutionInterface $entity)
    {
        /**
         * @todo
         */
        throw new \Exception('FSO not implemented yet');
//        $mustRecode = false;
//
//        $fso = $model->fetchOriginalFile(false);
//
//        if ($fso instanceof \Iron_Model_Fso && $fso->mustFlush()) {
//            $mustRecode = true;
//            // TODO: Set status a pending de reencoder (pending, encoding, ready, error)
//            $model->setStatus('pending');
//        }
//
//        $response = parent::_save($model, $recursive, $useTransaction, $transactionTag, $forceInsert);
//
//        if ($mustRecode) {
//            $recoderJob = new Recoder();
//            $recoderJob
//                ->setId($model->getPrimaryKey())
//                ->setModelName("Locutions")
//                ->send();
//        }
//
//        return $response;
    }
}