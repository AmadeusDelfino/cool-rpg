<?php

namespace Adelf\CoolRPG\Dices;


class Base
{
    protected $minValue = 1;
    protected $maxValue = 1;

    public function roll()
    {
        return random_int($this->minValue, $this->maxValue);
    }

    public function rollWithModify(int $modify)
    {
        return $this->roll() + $modify;
    }
}