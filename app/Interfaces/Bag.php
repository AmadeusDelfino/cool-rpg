<?php

namespace Adelf\CoolRPG\Interfaces;

interface Bag
{
    public function get(int $indexItem) : Item;

    public function remainingSpace() : int;

    public function add(Item $item) : self;

    public function remove(int $indexItem) : self;

    public function addGold(int $gold);

    public function removeGold(int $gold);

    public function items() : array;
}
