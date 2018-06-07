<?php

namespace Adelf\CoolRPG\Items\Catalog\Swords;

use Adelf\CoolRPG\Dices\D10;
use Adelf\CoolRPG\Interfaces\Dice;

class GreaterSword extends Base
{
    protected $name = 'Espada grande';
    protected $description = 'Uma grande espada feita para ser usada com duas mãos';
    protected $twoHanded = true;

    protected $levelNeeded = 3;
    protected $strengthNeeded = 12;

    public function damageDice(): Dice
    {
        return new D10();
    }
}
