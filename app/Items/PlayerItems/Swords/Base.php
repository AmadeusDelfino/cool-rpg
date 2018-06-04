<?php

namespace Adelf\CoolRPG\Items\PlayerItems\Swords;

use Adelf\CoolRPG\Items\Effects\EnemyEffect;
use Adelf\CoolRPG\Items\PlayerItems\WeaponBase;

abstract class Base extends WeaponBase
{
    public function damageType(): string
    {
        return $this::SLASHING_DAMAGE;
    }

    public function effect(): array
    {
        $effect = new EnemyEffect();
        $effect
            ->lifeChange
            ->decrease($this->damageDice()->rollWithModify($this->damageModify));

        return [$effect];
    }

}