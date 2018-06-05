<?php

namespace Adelf\CoolRPG\Items\Catalog\Swords;


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

    public function size(): string
    {
        return $this::SMALL_SIZE;
    }
}
