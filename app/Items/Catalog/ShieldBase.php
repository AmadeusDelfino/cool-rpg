<?php

namespace Adelf\CoolRPG\Items\Catalog;

use Adelf\CoolRPG\Interfaces\Shield;
use Adelf\CoolRPG\Interfaces\Weapon;

abstract class ShieldBase extends WeaponBase implements Weapon, Shield
{
    protected $defenseModify = 0;

    /**
     * @return int
     */
    public function getDefenseModify(): int
    {
        return $this->defenseModify;
    }

    /**
     * @param int $defenseModify
     *
     * @return ShieldBase
     */
    public function setDefenseModify(int $defenseModify)
    {
        $this->defenseModify = $defenseModify;

        return $this;
    }
}
