<?php

namespace Adelf\CoolRPG\Player;


use Adelf\CoolRPG\Interfaces\Bag;
use Adelf\CoolRPG\Items\PlayerItems\Bags\PoorBag;
use Adelf\CoolRPG\Stats\Player\Stats;

class CoolPlayer
{
    protected $stats;
    protected $bag;

    /**
     * CoolPlayer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->bag = new PoorBag();
        $this->stats = new Stats();

        $this->warmupPlayer();
    }

    /**
     * @throws \Exception
     */
    protected function warmupPlayer()
    {
        $this->stats->initCommonAttributes();
        $this->stats->calculateMaxLife();
        $this->stats->life()->changeCurrentLife($this->stats->life()->getMaxLife());
    }

    public function bag() : Bag
    {
        return $this->bag;
    }

    public function stats() : Stats
    {
        return $this->stats;
    }

    public function levelUp($levels = 1)
    {
        for(;$levels > 0;$levels--){
            $this->stats->addLevel();
        }
    }
}
