<?php

namespace Adelf\CoolRPG\Personate\Equips;


use Adelf\CoolRPG\Exceptions\CantUseShieldException;
use Adelf\CoolRPG\Exceptions\CantUseTwoHandedWeaponException;
use Adelf\CoolRPG\Interfaces\Weapon;
use Adelf\CoolRPG\Items\Catalog\ShieldBase;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;

class EquipsControl
{
    /** @var WeaponBase */
    protected $weapon;
    /** @var ShieldBase */
    protected $shield;
    protected $helmet;
    protected $armor;
    protected $pants;
    protected $shoes;

    /**
     * @param ShieldBase $shield
     * @return bool
     */
    protected function canUseShield(ShieldBase $shield) : bool
    {
        if(is_null($this->weapon)) {
            return true;
        }

        if($this->weapon->isTwoHanded()) {
            return false;
        }

        if(($shield->size() === WeaponBase::LARGE_SIZE || $shield->size() === WeaponBase::VERY_LARGE_SIZE)
            && $this->weapon->size() !== WeaponBase::SMALL_SIZE) {
            return false;
        }

        return true;
    }

    /**
     * @param Weapon $weapon
     * @return EquipsControl
     * @throws CantUseTwoHandedWeaponException
     */
    public function useWeapon(Weapon $weapon)
    {
        if($weapon->isTwoHanded() && ! $this->canUseTwoHandedWeapon()) {
            throw new CantUseTwoHandedWeaponException();
        }

        $this->weapon = $weapon;

        return $this;
    }

    /**
     * @param ShieldBase $shield
     * @return EquipsControl
     * @throws CantUseShieldException
     */
    public function useShield(ShieldBase $shield)
    {
        if(! $this->canUseShield($shield)) {
            throw new CantUseShieldException();
        }

        $this->shield = $shield;

        return $this;
    }

    protected function canUseTwoHandedWeapon(): bool
    {
        if(! is_null($this->shield)) {
            return false;
        }

        return true;
    }

    /**
     * @return WeaponBase
     */
    public function getWeapon(): ?WeaponBase
    {
        return $this->weapon;
    }

    /**
     * @return ShieldBase
     */
    public function getShield(): ?ShieldBase
    {
        return $this->shield;
    }

    /**
     * @return mixed
     */
    public function getHelmet()
    {
        return $this->helmet;
    }

    /**
     * @return mixed
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * @return mixed
     */
    public function getPants()
    {
        return $this->pants;
    }

    /**
     * @return mixed
     */
    public function getShoes()
    {
        return $this->shoes;
    }
}