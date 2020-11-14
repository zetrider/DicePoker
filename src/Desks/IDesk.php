<?php

namespace ZetRider\DicePoker\Desks;

use ZetRider\DicePoker\Results\IResult;

interface IDesk
{
    /**
     * Get result
     *
     * @return IResult
     */
    public function result(): IResult;
}
