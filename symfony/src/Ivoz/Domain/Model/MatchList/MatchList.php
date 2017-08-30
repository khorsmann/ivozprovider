<?php

namespace Ivoz\Domain\Model\MatchList;
use Ivoz\Domain\Model\MatchListPattern\MatchListPatternInterface;

/**
 * MatchList
 */
class MatchList extends MatchListAbstract implements MatchListInterface
{
    use MatchListTrait;

    /**
     * Check if the given number matches the list rules
     *
     * @param string $number in E164 form
     * @return true if number matches, false otherwise
     */
    public function numberMatches($number)
    {
        // Get patterns
        $patterns = $this->getPatterns();

        /**
         * @var MatchListPatternInterface $pattern
         */
        foreach ($patterns as $pattern) {
            switch ($pattern->getType()) {
                case 'number':
                    if ($pattern->getNumberE164() == $number) {
                        return true;
                    }
                    break;
                case 'regexp':
                    $regexp = $pattern->getRegExp();
                    $match = preg_match('/' . $regexp . '/', $number);
                    if ($match) {
                        return true;
                    }
                    break;
            }
        }

        return false;
    }
}

