<?php

namespace Adelf\CoolRPG\Items\Catalog;


use Adelf\CoolRPG\Interfaces\Dice;
use Adelf\CoolRPG\Interfaces\Weapon;

abstract class WeaponBase extends Base implements Weapon
{
    CONST SLASHING_DAMAGE = 'slashing_damage';
    CONST CONTUSION_DAMAGE = 'contusion_damage';
    CONST PIERCING_DAMAGE = 'piercing_damage';

    protected $hitModify = 0;
    protected $damageModify = 0;

    abstract public function damageDice(): Dice;

    abstract public function damageType(): string;

    /**
     * @return int
     */
    public function getHitModify(): int
    {
        return $this->hitModify;
    }

    /**
     * @param int $hitModify
     */
    public function setHitModify(int $hitModify): void
    {
        $this->hitModify = $hitModify;
    }

    /**
     * @return int
     */
    public function getDamageModify(): int
    {
        return $this->damageModify;
    }

    /**
     * @param int $damageModify
     */
    public function setDamageModify(int $damageModify): void
    {
        $this->damageModify = $damageModify;
    }
}