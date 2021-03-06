<?php

namespace Adelf\CoolRPG\Items\Catalog;

use Adelf\CoolRPG\Interfaces\Dice;
use Adelf\CoolRPG\Interfaces\Weapon;

abstract class WeaponBase extends Base implements Weapon
{
    const SLASHING_DAMAGE = 'slashing_damage';
    const CONTUSION_DAMAGE = 'contusion_damage';
    const PIERCING_DAMAGE = 'piercing_damage';

    protected $hitModify = 0;
    protected $damageModify = 0;

    protected $twoHanded = false;
    protected $finesse = false;

    abstract public function damageDice(): Dice;

    abstract public function damageType(): string;

    abstract public function size(): string;

    /**
     * @return int
     */
    public function getHitModify(): int
    {
        return $this->hitModify;
    }

    /**
     * @param int $hitModify
     *
     * @return WeaponBase
     */
    public function setHitModify(int $hitModify) : WeaponBase
    {
        $this->hitModify = $hitModify;

        return $this;
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
     *
     * @return WeaponBase
     */
    public function setDamageModify(int $damageModify) : WeaponBase
    {
        $this->damageModify = $damageModify;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTwoHanded() : bool
    {
        return $this->twoHanded;
    }

    /**
     * @param bool $twoHanded
     *
     * @return WeaponBase
     */
    public function setTwoHanded(bool $twoHanded) : WeaponBase
    {
        $this->twoHanded = $twoHanded;

        return $this;
    }

    public function isFinesse() : bool
    {
        return $this->finesse;
    }
}
