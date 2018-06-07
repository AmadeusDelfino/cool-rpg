<?php

namespace Adelf\CoolRPG\Items\Catalog\Shields;

use Adelf\CoolRPG\Dices\D2;
use Adelf\CoolRPG\Interfaces\Dice;

class BucklerShield extends Base
{
    protected $defenseModify = 1;

    public function damageDice(): Dice
    {
        return new D2();
    }

    public function size(): string
    {
        return $this::SMALL_SIZE;
    }
}
