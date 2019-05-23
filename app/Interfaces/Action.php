<?php

namespace Adelf\CoolRPG\Interfaces;


interface Action
{
    public function getItem(): Weapon;
    public function hitRoll(): Dice;
    public function damageRoll();
}