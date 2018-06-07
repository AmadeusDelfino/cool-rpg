<?php

namespace Adelf\CoolRPG\Items\Catalog\Swords;

use Adelf\CoolRPG\Dices\D10;
use Adelf\CoolRPG\Interfaces\Dice;
use Adelf\CoolRPG\Items\RulesToUse\Constants;

class GreaterSword extends Base
{
    protected $name = 'Espada grande';
    protected $description = 'Uma grande espada feita para ser usada com duas mãos';
    protected $twoHanded = true;

    function damageDice(): Dice
    {
        return new D10();
    }

    protected function configureCustomRules()
    {
        $this
            ->rulesToUse
            ->addPlayerRules([
                Constants::STRENGTH => [
                    Constants::BIGGER_OR_EQUAL => 8
                ],
                Constants::LEVEL => [
                    Constants::BIGGER => 3,
                ],
            ]);
    }

}
