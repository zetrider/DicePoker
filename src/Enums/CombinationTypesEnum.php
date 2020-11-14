<?php

namespace ZetRider\DicePoker\Enums;

class CombinationTypesEnum extends Enum implements IEnum
{
    const CHANCE = 'chance';
    const ONE_PAIR = 'one_pair';
    const TWO_PAIRS = 'two_pairs';
    const THREE_OF_A_KIND = 'three_of_a_kind';
    const SMALLSTREET = 'small_street';
    const BIGSTREET = 'big_street';
    const FULLHOUSE = 'full_house';
    const FOUR_OF_A_KIND = 'four_of_a_kind';
    const POKER = 'poker';

    protected static $values = [
        self::CHANCE => 'Шанс',
        self::ONE_PAIR => 'Пара',
        self::TWO_PAIRS => 'Две пары',
        self::THREE_OF_A_KIND => 'Сэт',
        self::SMALLSTREET => 'Малый стрит',
        self::BIGSTREET => 'Большой стрит',
        self::FULLHOUSE => 'Фул хаус',
        self::FOUR_OF_A_KIND => 'Каре',
        self::POKER => 'Покер',
    ];
}
