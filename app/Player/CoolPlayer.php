<?php

namespace Adelf\CoolRPG\Player;


use Adelf\CoolRPG\Interfaces\Bag;
use Adelf\CoolRPG\Personate\Common;
use Adelf\CoolRPG\Personate\Equips\EquipsControl;
use Adelf\CoolRPG\Stats\Player\Stats;

class CoolPlayer extends Common
{
    /** @var Stats */
    protected $stats;
    protected $bag;
    /** @var EquipsControl */
    protected $equips;

    /**
     * CoolPlayer constructor.
     * @throws \Exception
     */
    protected function warmupPersona() : void
    {
        $this->stats = new Stats();
        $this->equips = new EquipsControl();

        $this->stats->initCommonAttributes();
        $this->stats->calculateMaxLife();
        $this->stats->life()->changeCurrentLife($this->stats->life()->getMaxLife());
    }

    public function getDefenseValue() : int
    {
        $defenseModify  = is_null($this->equips->getShield()) ? 0 : $this->equips->getShield()->getDefenseModify();

        return $this->stats->getDefenseValue($defenseModify);
    }

    public function defineBag(Bag $bag)
    {
        $this->bag = $bag;

        return $this;
    }

    public function levelUp($levels = 1)
    {
        for(;$levels > 0;$levels--){
            $this->stats->addLevel();
        }
    }

    /*
     * Access facilitators
     */
    public function bag() : Bag
    {
        return $this->bag;
    }

    public function stats() : Stats
    {
        return $this->stats;
    }

    public function equips() : EquipsControl
    {
        return $this->equips;
    }
}
