<?php

namespace ZetRider\DicePoker\Combinations;

class CombinationCouple implements ICombination
{
    /** @var array */
    protected $probabilities;

    /**
     * @param array $probabilities
     */
    public function __construct($probabilities)
    {
        $this->probabilities = $probabilities;
    }

    /**
     * Get result
     *
     * @return bool
     */
    public function result(): bool
    {
        $probabilities = $this->probabilities;
        sort($probabilities);

        $couple = [];

        foreach ($probabilities as $var) {
            if (empty($couple) or in_array($var, $couple)) {
                $couple[] = $var;
            }
        }

        if (count($couple) > 0) {
            return true;
        }

        return false;
    }
}
