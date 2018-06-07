<?php

namespace Adelf\CoolRPG\Effects\Changes;

abstract class Base
{
    protected $value = 0;

    public function increase(float $value)
    {
        $this->value += $value;

        return $this;
    }

    public function decrease(float $value)
    {
        $this->value -= $value;

        return $this;
    }

    public function value()
    {
        return $this->value;
    }
}
