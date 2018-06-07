<?php

namespace Adelf\CoolRPG\Items\Catalog\Potions;

use Adelf\CoolRPG\Effects\PlayerEffect;

class DeathPotion extends Base
{
    protected $name = 'Poção da Morte';
    protected $description = 'Quem ingerir está poção vai morrer instantâneamente';

    public function effects(): array
    {
        $effect = new PlayerEffect();
        $effect->lifeChange->decrease(-9999999999999999999);

        return [$effect];
    }
}
