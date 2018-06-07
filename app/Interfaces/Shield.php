<?php

namespace Adelf\CoolRPG\Interfaces;

interface Shield
{
    public function getDefenseModify(): int;

    public function setDefenseModify(int $defenseModify);
}
