<?php

namespace ZetRider\DicePoker\Enums;

class Enum
{
    /** @var array */
    protected static $values = [];

    /**
     * Get values
     *
     * @return array
     */
    public static function values(): array
    {
        return static::$values;
    }

    /**
     * Get value
     *
     * @param string $key
     * @return string|null
     */
    public static function valueByKey($key)
    {
        $values = static::values();
        if (array_key_exists($key, $values)) {
            return $values[$key];
        }
        return null;
    }
}
