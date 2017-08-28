<?php

namespace Kam\Domain\Model\AccCdr;

/**
 * AccCdr
 */
class AccCdr extends AccCdrAbstract implements AccCdrInterface
{
    use AccCdrTrait;

    /**
     * @todo move this to its own service
     */
    public function tarificate($plan = null)
    {
        Throw new \Exception('Not implemented yet.');
    }

    /**
     * @return bool
     */
    public function isBounced()
    {
        if ($this->getBounced() == 'yes') {
            return true;
        }

        return false;
    }
}

