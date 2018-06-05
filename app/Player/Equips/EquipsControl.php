<?php

namespace Adelf\CoolRPG\Player\Equips;


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

    protected function canUseShield()
    {
        if(is_null($this->weapon)) {
            return true;
        }

        return ! $this->weapon->isTwoHanded();
    }

    /**
     * @param Weapon $weapon
     * @return EquipsControl
     * @throws CantUseTwoHandedWeaponException
     */
    protected function useWeapon(Weapon $weapon)
    {
        if($weapon->isTwoHanded() && ! $this->canUseTwoHandedWeapon()) {
            throw new CantUseTwoHandedWeaponException();
        }

        $this->weapon = $weapon;

        return $this;
    }

    protected function canUseTwoHandedWeapon(): bool
    {
        if(is_null($this->shield)) {
            return true;
        }

        if($this->shield->size() === WeaponBase::LARGE_SIZE) {
            return false;
        }

        if($this->shield->size() === WeaponBase::VERY_LARGE_SIZE) {
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