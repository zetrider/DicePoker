<?php

namespace ZetRider\DicePoker;

use ZetRider\DicePoker\Desks\ADesk;

use ZetRider\DicePoker\Enums\CombinationTypesEnum;

use ZetRider\DicePoker\Combinations\CombinationRand;
use ZetRider\DicePoker\Combinations\CombinationSort;
use ZetRider\DicePoker\Combinations\CombinationCouple;
use ZetRider\DicePoker\Combinations\CombinationCouples;

class DemoDesk extends ADesk
{
    /**
     * Calculate probabilities
     *
     * @return void
     */
    protected function calculateCombinations()
    {
        $vars = $this->getProbabilities();

        // Шанс - пять костей разного достоинства, например, 1, 2, 4, 5, 6.
        if ((new CombinationRand($vars))->result()) {
            $this->combinations[] = CombinationTypesEnum::CHANCE;
        }

        // Пара - две кости одинакового достоинства, например, 2, 2
        if ((new CombinationCouple($vars))->result()) {
            $this->combinations[] = CombinationTypesEnum::ONE_PAIR;
        }

        // Две пары - две кости одного достоинства и две кости другого достоинства, например, 3, 3 и 6, 6
        if ((new CombinationCouples($vars, 2, 2))->result()) {
            $this->combinations[] = CombinationTypesEnum::TWO_PAIRS;
        }

        // Сэт - три кости одинакового достоинства, например, 1, 1, 1
        if ((new CombinationCouples($vars, 3, 1))->result()) {
            $this->combinations[] = CombinationTypesEnum::THREE_OF_A_KIND;
        }

        // Малый стрит - последовательность четырёх костей 1, 2, 3, 4 или 2, 3, 4, 5 или 3, 4, 5, 6
        if ((new CombinationSort($vars, 4))->result()) {
            $this->combinations[] = CombinationTypesEnum::SMALLSTREET;
        }

        // Большой стрит - последовательность пяти костей 1, 2, 3, 4, 5 или 2, 3, 4, 5, 6
        if ((new CombinationSort($vars, 5))->result()) {
            $this->combinations[] = CombinationTypesEnum::BIGSTREET;
        }

        // Фул хаус - "пара" плюс "сэт", например, 1, 1, 3, 3, 3
        if (in_array(CombinationTypesEnum::TWO_PAIRS, $this->combinations) and in_array(CombinationTypesEnum::THREE_OF_A_KIND, $this->combinations)) {
            $this->combinations[] = CombinationTypesEnum::FULLHOUSE;
        }

        // Каре - четыре кости одинакового достоинства, например, 4, 4, 4, 4
        if ((new CombinationCouples($vars, 4, 1))->result()) {
            $this->combinations[] = CombinationTypesEnum::FOUR_OF_A_KIND;
        }

        // Покер - пять костей одинакового достоинства, например, 5, 5, 5, 5, 5
        if ((new CombinationCouples($vars, 5, 1))->result()) {
            $this->combinations[] = CombinationTypesEnum::POKER;
        }

        return $this;
    }
}
