<?php

namespace Adelf\CoolRPG\Player\Actions;


class Base
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
