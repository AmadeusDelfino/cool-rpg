<?php

namespace Adelf\CoolRPG\Items\Catalog\Swords;

use Adelf\CoolRPG\Dices\D8;
use Adelf\CoolRPG\Interfaces\Dice;

class ShortSword extends Base
{
    protected $name = 'Espada curta';
    protected $description = 'Espada curta feita de um metal leve';

    public function damageDice(): Dice
    {
        return new D8();
    }

    public function size(): string
    {
        return $this::SMALL_SIZE;
    }
}
