<?php

namespace Adelf\CoolRPG\Items\PlayerItems;


use Adelf\CoolRPG\Interfaces\Dice;

abstract class WeaponBase extends Base
{
    CONST SLASHING_DAMAGE = 'slashing_damage';
    CONST CONTUSION_DAMAGE = 'contusion_damage';
    CONST PIERCING_DAMAGE = 'piercing_damage';

    protected $hitModify = 0;
    protected $damageModify = 0;

    abstract function damageDice(): Dice;

    abstract function damageType(): string;
}