<?php

namespace Ivoz\Domain\Model\Country;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\Common\Collections\Selectable;

interface CountryRepository extends ObjectRepository, Selectable {}

