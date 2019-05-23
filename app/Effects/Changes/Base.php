<?php

namespace Adelf\CoolRPG\Effects\Changes;

use Adelf\CoolRPG\Interfaces\EffectChanges;

abstract class Base implements EffectChanges
{
    protected $value = 0.0;

    public function increase(float $value) : Base
    {
        $this->value += $value;

        return $this;
    }

    public function decrease(float $value) : Base
    {
        $this->value -= $value;

        return $this;
    }

    public function value() : float
    {
        return $this->value;
    }
}
