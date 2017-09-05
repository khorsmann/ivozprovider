<?php

namespace Core\Domain\Service;

use Core\Application\DataTransferObjectInterface;
use Core\Domain\Model\EntityInterface;

interface PersistErrorHandlerInterface
{
    public function handle(\Exception $e);
}