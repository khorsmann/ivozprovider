<?php

namespace Ivoz\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Ivoz\Domain\Model\QueueMember\QueueMemberRepository;

/**
 * QueueMemberDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QueueMemberDoctrineRepository extends EntityRepository implements QueueMemberRepository
{
}