<?php

namespace Adelf\CoolRPG\Items\Catalog\Swords;

use Adelf\CoolRPG\Items\Catalog\WeaponBase;
use Adelf\CoolRPG\Effects\EnemyEffect;

abstract class Base extends WeaponBase
{
    public function damageType(): string
    {
        return $this::SLASHING_DAMAGE;
    }

    public function effects(): array
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
