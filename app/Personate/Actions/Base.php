<?php

namespace Adelf\CoolRPG\Personate\Actions;

abstract class Base
{
    protected $name;
    protected $description;
    protected $item;

    public function getItem()
    {
        return $this->item;
    }

    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }
}
