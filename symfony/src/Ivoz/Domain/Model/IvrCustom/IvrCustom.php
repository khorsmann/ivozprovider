<?php
namespace Ivoz\Domain\Model\IvrCustom;
use Ivoz\Domain\Model\Locution\LocutionInterface;

/**
 * IvrCustom
 */
class IvrCustom extends IvrCustomAbstract implements IvrCustomInterface
{
    use IvrCustomTrait;

    /**
     * @return LocutionInterface[] with key=>value
     */
    public function getAllLocutions ()
    {
        return [
            'welcome' => $this->getWelcomeLocution(),
            'noanswer' => $this->getNoAnswerLocution(),
            'error' => $this->getErrorLocution(),
            'success' => $this->getSuccessLocution()
        ];
    }
}

