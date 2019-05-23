<?php

namespace Adelf\CoolRPG\Interfaces;


use Adelf\CoolRPG\Effects\Changes\Base;

interface EffectChanges
{
    public function increase(float $value) : Base;
    public function decrease(float $value) : Base;
    public function value() : float;
}