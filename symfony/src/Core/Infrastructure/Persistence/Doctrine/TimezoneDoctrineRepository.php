<?php

namespace Core\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Core\Model\Timezone\TimezoneRepository;

/**
 * TimezoneDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TimezoneDoctrineRepository extends EntityRepository implements TimezoneRepository
{
}
