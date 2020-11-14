<?php

namespace ZetRider\DicePoker\Desks;

use ZetRider\DicePoker\Players\IPlayer;
use ZetRider\DicePoker\Results\IResult;
use ZetRider\DicePoker\Results\Result;

use ZetRider\DicePoker\Enums\CombinationTypesEnum;
use ZetRider\DicePoker\Enums\CombinationScoreEnum;

abstract class ADesk implements IDesk
{
    /** @var IPlayer */
    protected $player;

    /** @var array */
    protected $probabilities = [];

    /** @var array */
    protected $combinations = [];

    /**
     * @param IPlayer $player
     */
    public function __construct(IPlayer $player)
    {
        $this->player = $player;
    }

    /**
     * Roll
     *
     * @return Desk
     */
    public function roll()
    {
        for ($i = 0; $i < 5; $i++) {
            $this->probabilities[] = rand(1, 6);
        }

        return $this;
    }

    /**
     * Get probabilities
     *
     * @return array
     */
    protected function getProbabilities()
    {
        return $this->probabilities;
    }

    /**
     * Calculate probabilities
     */
    abstract protected function calculateCombinations();

    /**
     * Get result
     *
     * @return IResult
     */
    public function result(): IResult
    {
        $this->calculateCombinations();

        $types = CombinationTypesEnum::values();
        $scores = CombinationScoreEnum::values();

        // By scores
        $combinations = [];
        foreach ($this->combinations as $val) {
            $combinations[$scores[$val]] = $types[$val];
        }
        ksort($combinations);
        $temp = array_reverse($combinations);
        $combination = array_shift($temp);

        $name = $this->player->getName();
        $result = new Result($name, $combinations, $combination);

        return $result;
    }
}
