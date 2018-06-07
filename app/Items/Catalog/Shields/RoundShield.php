<?php

namespace Adelf\CoolRPG\Items\Catalog\Shields;

use Adelf\CoolRPG\Dices\D2;
use Adelf\CoolRPG\Interfaces\Dice;

class RoundShield extends Base
{
    protected $defenseModify = 3;

    public function damageDice(): Dice
    {
        return new D2();
    }
}
