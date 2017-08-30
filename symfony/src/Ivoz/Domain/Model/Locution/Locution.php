<?php
namespace Ivoz\Domain\Model\Locution;

/**
 * Locution
 */
class Locution extends LocutionAbstract implements LocutionInterface
{
    use LocutionTrait;

    public function getLocutionPath ()
    {
        throw new \Exception('FSO not implemented yet');
        return substr($this->fetchEncodedFile()->getFilePath(), 0, - 4);
    }
}

