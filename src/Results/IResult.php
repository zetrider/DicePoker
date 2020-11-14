<?php

namespace ZetRider\DicePoker\Results;

interface IResult
{
    /**
     * Get name
     *
     * @return string
     */
    public function name(): string;

    /**
     * Get combinations
     *
     * @return array
     */
    public function combinations(): array;

    /**
     * Get combination
     *
     * @return string
     */
    public function combination(): string;
}
