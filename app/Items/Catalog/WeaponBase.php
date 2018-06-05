<?php

namespace Adelf\CoolRPG\Items\Catalog;


use Adelf\CoolRPG\Interfaces\Dice;
use Adelf\CoolRPG\Interfaces\Weapon;

abstract class WeaponBase extends Base implements Weapon
{
    CONST SLASHING_DAMAGE = 'slashing_damage';
    CONST CONTUSION_DAMAGE = 'contusion_damage';
    CONST PIERCING_DAMAGE = 'piercing_damage';

    CONST SMALL_SIZE = 'small';
    CONST MEDIUM_SIZE = 'medium';
    CONST LARGE_SIZE = 'large';
    CONST VERY_LARGE_SIZE = 'very_large';

    protected $hitModify = 0;
    protected $damageModify = 0;

    protected $twoHanded = false;

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

    /**
     * @return bool
     */
    public function isTwoHanded() : bool
    {
        return $this->twoHanded;
    }

    /**
     * @param bool $twoHanded
     * @return WeaponBase
     */
    public function setTwoHanded(bool $twoHanded)
    {
        $this->twoHanded = $twoHanded;

        return $this;
    }

}