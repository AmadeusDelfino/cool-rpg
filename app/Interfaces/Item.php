<?php

namespace Adelf\CoolRPG\Interfaces;


interface Item
{
    public function canUse($data) : bool;

    public function effect() : array;
}