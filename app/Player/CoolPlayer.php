<?php

namespace Adelf\CoolRPG\Player;


use Adelf\CoolRPG\Interfaces\Bag;
use Adelf\CoolRPG\Personate\Common;
use Adelf\CoolRPG\Stats\Player\Stats;

class CoolPlayer extends Common
{
    /** @var Stats */
    protected $stats;
    protected $bag;

    /**
     * CoolPlayer constructor.
     * @throws \Exception
     */
    protected function warmupPersona() : void
    {
        $this->stats = new Stats();
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

    public function defineBag(Bag $bag)
    {
        $this->bag = $bag;

        return $this;
    }
}
