<?php

namespace Adelf\CoolRPG\Items\Catalog\Shields;

use Adelf\CoolRPG\Dices\D8;
use Adelf\CoolRPG\Interfaces\Dice;

class SpikedShield extends Base
{
    protected $defenseModify = 2;

    public function damageDice(): Dice
    {
        return new D8();
    }
}
