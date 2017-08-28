<?php

namespace Ivoz\Domain\Model\IvrCommon;

use Doctrine\Common\Collections\Criteria;
use Ivoz\Domain\Model\Extension\Extension;
use Ivoz\Domain\Model\Locution\Locution;

/**
 * IvrCommon
 */
class IvrCommon extends IvrCommonAbstract implements IvrCommonInterface
{
    use IvrCommonTrait;

    /**
     * @return Locution[] with key=>value
     */
    public function getAllLocutions()
    {
        return [
            'welcome' => $this->getWelcomeLocution(),
            'noanswer' => $this->getNoAnswerLocution(),
            'error' => $this->getErrorLocution(),
            'success' => $this->getSuccessLocution(),
        ];
    }

    /**
     * @param Criteria $criteria
     * @return null|Extension
     */
    public function getExtension(Criteria $criteria = null)
    {
        return $this
            ->getExtensions($criteria)
            ->first();
    }
}

