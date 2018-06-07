<?php

namespace Adelf\CoolRPG\Personate\Equips\Validators;


use Adelf\CoolRPG\Items\Catalog\ShieldBase;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;

class CanUseShield
{
    /**
     * @param ShieldBase $shield
     * @param WeaponBase|null $weapon
     * @return bool
     */
    public function __invoke(ShieldBase $shield, ?WeaponBase $weapon = null)
    {
        if(is_null($weapon)) {
            return true;
        }

        if($weapon->isTwoHanded()) {
            return false;
        }

        if(($shield->size() === WeaponBase::LARGE_SIZE || $shield->size() === WeaponBase::VERY_LARGE_SIZE)
            && $weapon->size() !== WeaponBase::SMALL_SIZE) {
            return false;
        }

        return true;
    }
}