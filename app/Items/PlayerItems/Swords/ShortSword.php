<?php

namespace Adelf\CoolRPG\Items\PlayerItems\Swords;


use Adelf\CoolRPG\Dices\D6;
use Adelf\CoolRPG\Interfaces\Dice;

class ShortSword extends Base
{
    protected $name = 'Espada curta';
    protected $description = 'Espada curta feita de um metal leve';

    function damageDice(): Dice
    {
        return new D6();
    }
}
