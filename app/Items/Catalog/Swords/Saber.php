<?php

namespace Adelf\CoolRPG\Items\Catalog\Swords;

use Adelf\CoolRPG\Dices\D10;
use Adelf\CoolRPG\Interfaces\Dice;

class Saber extends Base
{
    protected $name = 'Sabre';
    protected $finesse = true;

    protected $dexterityNeeded = 16;
    protected $intelligenceNeeded = 10;

    public function damageDice(): Dice
    {
        return new D10();
    }

    public function size(): string
    {
        return $this::SMALL_SIZE;
    }


}
