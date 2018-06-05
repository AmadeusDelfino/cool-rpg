<?php

namespace Adelf\CoolRPG\Support\Handlers;


class FormatFloatNumbers
{
    public function __invoke($number)
    {
        return number_format((float) $number, 2);
    }
}