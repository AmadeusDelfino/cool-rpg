<?php

namespace Adelf\CoolRPG\Player\Actions;


use Adelf\CoolRPG\Dices\D20;
use Adelf\CoolRPG\Interfaces\Weapon;

class Attack extends Base
{
    public function getItem() : Weapon
    {
        return $this->item;
    }

    public function hitRoll()
    {
        return (new D20())
            ->rollWithModify(
                $this->getItem()->getHitModify()
            );
    }
}