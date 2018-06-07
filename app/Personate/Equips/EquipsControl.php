<?php

namespace Adelf\CoolRPG\Personate\Equips;

use Adelf\CoolRPG\Exceptions\CantUseShieldException;
use Adelf\CoolRPG\Exceptions\CantUseTwoHandedWeaponException;
use Adelf\CoolRPG\Interfaces\Weapon;
use Adelf\CoolRPG\Items\Catalog\ShieldBase;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;
use Adelf\CoolRPG\Personate\Equips\Validators\CanUseShield;
use Adelf\CoolRPG\Personate\Equips\Validators\CanUseTwoHeadedWeapon;

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
     * @param Weapon $weapon
     *
     * @throws CantUseTwoHandedWeaponException
     *
     * @return EquipsControl
     */
    public function useWeapon(Weapon $weapon)
    {
        if (!(new CanUseTwoHeadedWeapon())($weapon, $this->shield)) {
            throw new CantUseTwoHandedWeaponException();
        }

        $this->weapon = $weapon;

        return $this;
    }

    /**
     * @param ShieldBase $shield
     *
     * @throws CantUseShieldException
     *
     * @return EquipsControl
     */
    public function useShield(ShieldBase $shield)
    {
        if (!(new CanUseShield())($shield, $this->weapon)) {
            throw new CantUseShieldException();
        }

        $this->shield = $shield;

        return $this;
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
