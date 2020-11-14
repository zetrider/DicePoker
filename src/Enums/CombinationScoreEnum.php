<?php

namespace ZetRider\DicePoker\Enums;

class CombinationScoreEnum extends Enum implements IEnum
{
    protected static $values = [
        CombinationTypesEnum::CHANCE => 1,
        CombinationTypesEnum::ONE_PAIR => 2,
        CombinationTypesEnum::TWO_PAIRS => 3,
        CombinationTypesEnum::THREE_OF_A_KIND => 4,
        CombinationTypesEnum::SMALLSTREET => 5,
        CombinationTypesEnum::BIGSTREET => 6,
        CombinationTypesEnum::FULLHOUSE => 7,
        CombinationTypesEnum::FOUR_OF_A_KIND => 8,
        CombinationTypesEnum::POKER => 9,
    ];
}
