<?php

namespace Adelf\CoolRPG\Personate;


abstract class Common
{
    protected $stats;

    public function __construct()
    {
        $this->warmupPersona();
    }

    abstract protected function warmupPersona(): void;
}