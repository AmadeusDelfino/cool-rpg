<?php

namespace Adelf\CoolRPG\Personate\Actions;

use Adelf\CoolRPG\Dices\D20;
use Adelf\CoolRPG\Interfaces\Weapon;

class AttackAction extends Base
{
    protected $name = 'Ataque';
    protected $description = 'Ação de atacar algo';
    protected $hitModify = 0;
    protected $damageModify = 0;

    public function getItem() : Weapon
    {
        return $this->item;
    }

    public function hitRoll()
    {
        return (new D20())
            ->rollWithModify(
                $this->getItem()->getHitModify() + $this->hitModify
            );
    }

    public function damageRoll()
    {
        return $this
            ->getItem()
            ->damageDice()
            ->rollWithModify(
                $this->getItem()->getDamageModify() + $this->damageModify
            );
    }

    /**
     * @param int $hitModify
     * @return AttackAction
     */
    public function setHitModify(int $hitModify)
    {
        $this->hitModify = $hitModify;

        return $this;
    }

    /**
     * @param int $damageModify
     * @return AttackAction
     */
    public function setDamageModify(int $damageModify)
    {
        $this->damageModify = $damageModify;

        return $this;
    }
}
