<?php

namespace Adelf\CoolRPG\Personate\Actions;


use Adelf\CoolRPG\Dices\D20;
use Adelf\CoolRPG\Interfaces\Weapon;

class AttackAction extends Base
{
    protected $name = 'Ataque';
    protected $description = 'Ação de atacar algo';

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

    public function damageRoll()
    {
        return $this
            ->getItem()
            ->damageDice()
            ->rollWithModify(
                $this->getItem()->getDamageModify()
            );
    }
}