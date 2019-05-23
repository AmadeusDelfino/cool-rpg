<?php

namespace Adelf\CoolRPG\Interfaces;

interface Dice
{
    public function roll(): int;

    public function rollWithModify(int $modify): int;
}
