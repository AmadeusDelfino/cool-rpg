<?php

namespace Adelf\CoolRPG\Items\Catalog\Commons;

use Adelf\CoolRPG\Items\Effects\EnemyEffect;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;

abstract class Base extends WeaponBase
{
    public function damageType(): string
    {
        return $this::CONTUSION_DAMAGE;
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
        return $this::SMALL_SIZE;
    }
}