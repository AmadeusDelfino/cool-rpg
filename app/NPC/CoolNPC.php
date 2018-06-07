<?php

namespace Adelf\CoolRPG\NPC;

use Adelf\CoolRPG\Personate\Common;
use Adelf\CoolRPG\Stats\NPC\Stats;

class CoolNPC extends Common
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
