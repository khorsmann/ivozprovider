<?php

namespace Ast\Domain\Model\QueueMember;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\Common\Collections\Selectable;

interface QueueMemberRepository extends ObjectRepository, Selectable {}
