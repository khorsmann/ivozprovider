<?php

namespace Ivoz\Domain\Model\IvrCommon;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\Common\Collections\Selectable;

interface IvrCommonRepository extends ObjectRepository, Selectable {}

