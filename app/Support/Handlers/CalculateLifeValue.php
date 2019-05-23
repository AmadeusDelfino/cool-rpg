<?php

namespace Adelf\CoolRPG\Support\Handlers;

class CalculateLifeValue
{
    public function __invoke($level, $constitution)
    {
        return $level + ($constitution * 2);
    }
}
