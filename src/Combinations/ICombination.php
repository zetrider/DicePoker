<?php

namespace ZetRider\DicePoker\Combinations;

interface ICombination
{
    /**
     * Get result
     *
     * @return bool
     */
    public function result(): bool;
}
