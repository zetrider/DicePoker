<?php

namespace ZetRider\DicePoker\Combinations;

class CombinationSort implements ICombination
{
    /** @var array */
    protected $probabilities;

    /** @var int */
    protected $max;

    /**
     * @param array $probabilities
     * @param int $max - nums for condition
     */
    public function __construct($probabilities, $max)
    {
        $this->probabilities = $probabilities;
        $this->max = $max;
    }

    /**
     * Get result
     *
     * @return bool
     */
    public function result(): bool
    {
        $max = $this->max;
        $probabilities = $this->probabilities;
        sort($probabilities);

        $check = true;
        $prev  = null;
        $count = 1;

        foreach ($probabilities as $var) {
            if (is_numeric($prev) and ($var - $prev) != 1 and $count <= $max) {
                $check = false;
                break;
            }
            $prev = $var;
            $count++;
        }

        return $check;
    }
}
