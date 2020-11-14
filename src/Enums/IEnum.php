<?php

namespace ZetRider\DicePoker\Enums;

interface IEnum
{
    /**
     * Get values
     *
     * @return array
     */
    public static function values(): array;

    /**
     * Get value
     *
     * @return string|null
     */
    public static function valueByKey($key);
}
