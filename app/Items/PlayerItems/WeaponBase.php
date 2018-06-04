<?php

namespace Adelf\CoolRPG\Items\PlayerItems;


use Adelf\CoolRPG\Interfaces\Dice;

abstract class WeaponBase extends Base
{
    protected $hitModify = 0;
    protected $damageModify = 0;

    abstract function damageDice(): Dice;
}