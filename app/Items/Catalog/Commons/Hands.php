<?php

namespace Adelf\CoolRPG\Items\Catalog\Commons;

use Adelf\CoolRPG\Dices\D1;
use Adelf\CoolRPG\Interfaces\Dice;

class Hands extends Base
{
    protected $name = 'Mãos';
    protected $description = 'Apenas suas mãos e nada mais';

    public function damageDice(): Dice
    {
        return new D1();
    }

    public function size(): string
    {
        return $this::SMALL_SIZE;
    }
}
