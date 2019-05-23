<?php

namespace Adelf\CoolRPG\Interfaces;


interface ActionResult
{
    public function getDamageType(): string;
    public function setDamageType(string $type);
    public function getHit(): int;
    public function setHit(int $hit);
    public function setEffects(array $effects);
    public function getEffects() : array;

}