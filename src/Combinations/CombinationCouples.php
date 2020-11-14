<?php

namespace ZetRider\DicePoker\Combinations;

class CombinationCouples implements ICombination
{
    /** @var array */
    protected $probabilities;

    /** @var int */
    protected $max;

    /** @var int */
    protected $count;

    /**
     * @param array $probabilities
     * @param int $max - max nums in couple
     * @param int $count - min couples
     */
    public function __construct($probabilities, $max, $count)
    {
        $this->probabilities = $probabilities;
        $this->max = $max;
        $this->count = $count;
    }

    /**
     * Get result
     *
     * @return bool
     */
    public function result(): bool
    {
        $max = $this->max;
        $count = $this->count;
        $probabilities = $this->probabilities;
        sort($probabilities);

        $couples = [];

        foreach ($probabilities as $var) {
            if (!isset($couples[$var])) {
                $couples[$var] = 0;
            }
            $couples[$var]++;
        }

        $couples = array_filter($couples, function ($val) use ($max) {
            return $val == $max;
        });

        if (count($couples) >= $count) {
            return true;
        }

        return false;
    }
}
