<?php

namespace Adelf\CoolRPG\Items\Catalog\Bags;

use Adelf\CoolRPG\Interfaces\Bag;
use Adelf\CoolRPG\Interfaces\Item;
use Adelf\CoolRPG\Items\Catalog\Bags\ItemControl\ItemsList;
use Adelf\CoolRPG\Items\Catalog\Base as ItemBase;
use Adelf\CoolRPG\Effects\PlayerEffect;

abstract class Base extends ItemBase implements Bag
{
    protected $itemList;
    protected $space = 0;
    protected $gold = 0;

    public function __construct()
    {
        parent::__construct();
        $this->itemList = new ItemsList();
    }

    public function get($indexItem = null): Item
    {
        return $this->itemList->items()[$indexItem];
    }

    public function add($item): Bag
    {
        $this
            ->itemList
            ->add($item);

        return $this;
    }

    public function remove($indexItem): Bag
    {
        $this
            ->itemList
            ->remove($indexItem);

        return $this;
    }

    public function addGold(int $gold)
    {
        $this->gold += $gold;

        return $this;
    }

    public function removeGold(int $gold)
    {
        $this->gold -= $gold;

        return $this;
    }

    public function items() : array
    {
        return $this
            ->itemList
            ->items();
    }

    public function effects() : array
    {
        return [new PlayerEffect()];
    }

    public function remainingSpace() : int
    {
        return $this->space - $this->itemList->count();
    }
}
