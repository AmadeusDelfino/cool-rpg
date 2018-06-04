<?php

namespace Adelf\CoolRPG\Items\PlayerItems\Swords;

use Adelf\CoolRPG\Dices\D8;
use Adelf\CoolRPG\Interfaces\Dice;

class LongSword extends Base
{
    protected $name = 'Espada longa';
    protected $description = 'Espada longa feita de um metal leve';

    function damageDice(): Dice
    {
        return new D8();
    }
}
