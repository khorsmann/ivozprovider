<?php

namespace Ivoz\Domain\Model\EtagVersion;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\Common\Collections\Selectable;

interface EtagVersionRepository extends ObjectRepository, Selectable {}

