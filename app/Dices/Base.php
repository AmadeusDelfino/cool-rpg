<?php

namespace Adelf\CoolRPG\Dices;

use Adelf\CoolRPG\Interfaces\Dice;

class Base implements Dice
{
    protected $minValue = 1;
    protected $maxValue = 1;

    public function roll(): int
    {
        return random_int($this->minValue, $this->maxValue);
    }

    public function rollWithModify(int $modify): int
    {
        return $this->roll() + $modify;
    }
}
