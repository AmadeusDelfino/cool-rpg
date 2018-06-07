<?php

namespace Adelf\CoolRPG\NPC;

use Adelf\CoolRPG\Personate\Persona;
use Adelf\CoolRPG\Stats\NPC\Stats;

class CoolNPC extends Persona
{
    protected $stats;

    protected function warmupPersona(): void
    {
        $this->stats = new Stats();
        $this->stats->initCommonAttributes();
        $this->stats->calculateMaxLife();
        $this->stats->life()->changeCurrentLife($this->stats->life()->getMaxLife());
    }
}
