<?php

namespace Ivoz\Domain\Service\CallForwardSetting;

use Ivoz\Domain\Model\Brand\BrandInterface;
use Ivoz\Domain\Model\CallForwardSetting\CallForwardSettingInterface;

interface CallForwardSettingLifecycleEventHandlerInterface
{
    public function execute(CallForwardSettingInterface $entity);
}