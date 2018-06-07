<?php

namespace Adelf\CoolRPG\Items\Catalog\Commons;

use Adelf\CoolRPG\Dices\D2;
use Adelf\CoolRPG\Interfaces\Dice;

class Rock extends Base
{
    protected $name = 'Pedra';
    protected $description = 'Apenas uma pedra';

    public function damageDice(): Dice
    {
        return new D2();
    }
}
