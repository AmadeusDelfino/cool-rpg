<?php

namespace Adelf\CoolRPG\Support\Handlers;

class CalculateDefenseValueValue
{
    public function __invoke($dex, $armorModify = 0)
    {
        return 10 + ($dex/2) + $armorModify;
    }
}
