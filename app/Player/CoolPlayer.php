<?php

namespace Adelf\CoolRPG\Player;

use Adelf\CoolRPG\Interfaces\Bag;
use Adelf\CoolRPG\Personate\Persona;
use Adelf\CoolRPG\Personate\Equips\EquipsControl;
use Adelf\CoolRPG\Stats\Player\Stats;

class CoolPlayer extends Persona
{
    /**
     * CoolPlayer constructor.
     *
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

    public function defineBag(Bag $bag)
    {
        $this->bag = $bag;

        return $this;
    }

    public function levelUp($levels = 1)
    {
        for (; $levels > 0; $levels--) {
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
}
