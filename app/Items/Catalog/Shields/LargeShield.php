<?php

namespace Adelf\CoolRPG\Items\Catalog\Shields;


use Adelf\CoolRPG\Dices\D4;
use Adelf\CoolRPG\Interfaces\Dice;

class LargeShield extends Base
{
    protected $defenseModify = 4;

    public function damageDice(): Dice
    {
        return new D4();
    }

    public function size(): string
    {
        return $this::LARGE_SIZE;
    }
}