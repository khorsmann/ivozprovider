<?php

namespace Ivoz\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Ivoz\Domain\Model\Country\CountryRepository;

/**
 * CountryDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CountryDoctrineRepository extends EntityRepository implements CountryRepository
{
}