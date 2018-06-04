<?php

namespace Adelf\CoolRPG\Interfaces;


interface Dice
{
    public function roll();

    public function rollWithModify(int $modify);
}