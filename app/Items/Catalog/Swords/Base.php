<?php

namespace Adelf\CoolRPG\Items\Catalog\Swords;

use Adelf\CoolRPG\Items\Effects\EnemyEffect;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;

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

    public function size(): string
    {
        return $this::MEDIUM_SIZE;
    }
}