<?php

namespace Adelf\CoolRPG\Interfaces;


interface Bag
{
    public function remainingSpace() : int;

    public function add($item) : Bag;

    public function remove($indexItem) : Bag;
}