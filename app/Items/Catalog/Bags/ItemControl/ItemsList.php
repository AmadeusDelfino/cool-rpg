<?php

namespace Adelf\CoolRPG\Items\Catalog\Bags\ItemControl;


use Adelf\CoolRPG\Interfaces\Item;

class ItemsList
{
    protected $items = [];

    public function count()
    {
        return count($this->items);
    }

    public function add(Item $item)
    {
        $this->items[] = $item;

        return $this;
    }

    public function remove($itemIndex)
    {
        unset($this->items[$itemIndex]);

        return $this;
    }

    public function items()
    {
        return $this->items;
    }
}