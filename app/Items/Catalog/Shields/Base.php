<?php

namespace Adelf\CoolRPG\Items\Catalog\Shields;

use Adelf\CoolRPG\Items\Catalog\ShieldBase;
use Adelf\CoolRPG\Effects\EnemyEffect;

abstract class Base extends ShieldBase
{
    public function damageType(): string
    {
        return $this::CONTUSION_DAMAGE;
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
