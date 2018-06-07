<?php

namespace Adelf\CoolRPG\Interfaces;

interface Bag
{
    public function remainingSpace() : int;

    public function add($item) : self;

    public function remove($indexItem) : self;

    public function addGold(int $gold);

    public function removeGold(int $gold);

    public function items() : array;
}
