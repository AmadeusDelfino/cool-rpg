<?php

namespace Adelf\CoolRPG\Items\Catalog;


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

    public function size(): string
    {
        return $this::MEDIUM_SIZE;
    }
}