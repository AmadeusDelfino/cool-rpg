<?php

namespace Adelf\CoolRPG\Interfaces;


interface Bag
{
    public function remainingSpace() : int;

    public function add($item) : Bag;

    public function remove($indexItem) : Bag;

    public function addGold(int $gold);

    public function removeGold(int $gold);

    public function items() : array;
}