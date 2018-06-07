<?php

namespace Adelf\CoolRPG\Support\Handlers;

class CalculateDefenseValueValue
{
    public function __invoke($dex, $shieldDefenseModify = 0)
    {
        return $dex + $shieldDefenseModify;
    }
}
