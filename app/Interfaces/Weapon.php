<?php

namespace Adelf\CoolRPG\Interfaces;

interface Weapon
{
    public function damageDice(): Dice;

    public function damageType(): string;

    public function getDamageModify(): int;

    public function setDamageModify(int $damageModify);

    public function getHitModify(): int;

    public function setHitModify(int $hitModify);

    public function isTwoHanded(): bool;

    public function setTwoHanded(bool $twoHanded);

    public function size(): string;
}
