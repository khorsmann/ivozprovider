<?php

namespace Ast\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Ast\Domain\Model\Queue\QueueRepository;

/**
 * QueueDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QueueDoctrineRepository extends EntityRepository implements QueueRepository
{
}
