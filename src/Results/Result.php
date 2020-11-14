<?php

namespace ZetRider\DicePoker\Results;

class Result implements IResult
{
    /** @var string */
    private $name = '';

    /** @var array */
    private $combinations = [];

    /** @var string */
    private $combination = '';

    public function __construct($name, $combinations, $combination)
    {
        $this->name = $name;
        $this->combinations = $combinations;
        $this->combination = $combination;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Get combinations
     *
     * @return array
     */
    public function combinations(): array
    {
        return $this->combinations;
    }

    /**
     * Get combination
     *
     * @return string
     */
    public function combination(): string
    {
        return $this->combination;
    }
}
