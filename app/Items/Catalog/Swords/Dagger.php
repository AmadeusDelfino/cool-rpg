<?php

namespace Adelf\CoolRPG\Items\Catalog\Swords;

use Adelf\CoolRPG\Dices\D4;
use Adelf\CoolRPG\Interfaces\Dice;

class Dagger extends Base
{
    public function damageDice(): Dice
    {
        return new D4();
    }

    public function size(): string
    {
        return $this::SMALL_SIZE;
    }
}
