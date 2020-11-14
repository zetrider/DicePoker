<?php

namespace ZetRider\DicePoker\Players;

class Player implements IPlayer
{
    /** @var string */
    protected $name;

    /**
     * Set name
     *
     * @param string $name
     * @return IPlayer
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
