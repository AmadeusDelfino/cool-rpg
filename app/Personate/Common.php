<?php

namespace Adelf\CoolRPG\Personate;


abstract class Common
{
    protected $stats;

    public function __construct()
    {
        $this->configureStats();
    }

    abstract protected function configureStats(): void;
}