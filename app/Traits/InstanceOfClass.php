<?php

namespace Adelf\CoolRPG\Traits;


trait InstanceOfClass
{
    private function getInstanceOfClass(string $class)
    {
        return new $class;
    }
}