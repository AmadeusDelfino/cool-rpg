<?php

namespace Adelf\CoolRPG\Items\PlayerItems;


abstract class SpellCasterWeaponBase extends WeaponBase
{
    protected $magicHitModify = 0;
    protected $magicDamageModify = 0;
    protected $magicHealerModify = 0;

    protected function magicModifies() : array
    {
        return [
            'hit' => $this->magicHitModify,
            'damage' => $this->magicDamageModify,
            'healer' => $this->magicHealerModify,
        ];
    }
}