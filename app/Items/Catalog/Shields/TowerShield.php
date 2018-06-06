<?php

namespace Adelf\CoolRPG\Items\Catalog\Shields;


use Adelf\CoolRPG\Dices\D6;
use Adelf\CoolRPG\Interfaces\Dice;

class TowerShield extends Base
{
    public function damageDice(): Dice
    {
        return new D6();
    }

    public function size(): string
    {
        return $this::VERY_LARGE_SIZE;
    }
}