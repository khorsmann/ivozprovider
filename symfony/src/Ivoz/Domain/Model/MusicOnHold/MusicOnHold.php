<?php
namespace Ivoz\Domain\Model\MusicOnHold;

/**
 * MusicOnHold
 */
class MusicOnHold extends MusicOnHoldAbstract implements MusicOnHoldInterface
{
    use MusicOnHoldTrait;

    /**
     * @return string
     */
    public function getOwner()
    {
        return 'company' . $this->getCompany()->getId();
    }
}

