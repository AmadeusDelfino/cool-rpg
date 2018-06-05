<?php

namespace Adelf\CoolRPG\NPC;


use Adelf\CoolRPG\Stats\Player\Stats;

class CoolNPC
{
    protected $stats;

    public function __construct()
    {
        $this->stats = new Stats();

        $this->warmupNPC();
    }

    private function warmupNPC()
    {
        $this->stats->initCommonAttributes();
        $this->stats->calculateMaxLife();
        $this->stats->life()->changeCurrentLife($this->stats->life()->getMaxLife());
    }
}