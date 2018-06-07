<?php

namespace Adelf\CoolRPG\Personate\Equips\Validators;

use Adelf\CoolRPG\Items\Catalog\ShieldBase;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;

class CanUseTwoHeadedWeapon
{
    /**
     * @param ShieldBase      $shield
     * @param WeaponBase|null $weapon
     *
     * @return bool
     */
    public function __invoke(WeaponBase $weapon, ?ShieldBase $shield = null)
    {
        if ($weapon->isTwoHanded() && !is_null($shield)) {
            return false;
        }

        return true;
    }
}
