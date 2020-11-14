<?php

namespace ZetRider\DicePoker\Combinations;

class CombinationRand implements ICombination
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

        $check = true;
        $prev  = null;

        foreach ($probabilities as $var) {
            if (is_numeric($prev) and ($var - $prev) != 1) {
                $check = false;
                break;
            }
            $prev = $var;
        }

        return $check;
    }
}
