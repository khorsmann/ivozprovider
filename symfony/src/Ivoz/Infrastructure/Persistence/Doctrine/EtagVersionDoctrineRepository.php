<?php

namespace Ivoz\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Ivoz\Domain\Model\EtagVersion\EtagVersionRepository;

/**
 * EtagVersionDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EtagVersionDoctrineRepository extends EntityRepository implements EtagVersionRepository
{
}