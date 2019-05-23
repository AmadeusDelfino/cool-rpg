<?php

namespace Adelf\CoolRPG\Personate;

use Adelf\CoolRPG\Effects\PlayerEffect;
use Adelf\CoolRPG\Exceptions\ActionDontExistsException;
use Adelf\CoolRPG\Effects\Base as Effect;
use Adelf\CoolRPG\Interfaces\Bag;
use Adelf\CoolRPG\Personate\EffectApply\Handler;
use Adelf\CoolRPG\Personate\Equips\EquipsControl;
use Adelf\CoolRPG\Stats\Base;
use Adelf\CoolRPG\Traits\InstanceOfClass;

abstract class Persona
{
    use InstanceOfClass;

    /** @var Base */
    protected $stats;
    /** @var EquipsControl */
    protected $equips;
    /** @var Bag */
    protected $bag;


    public function __construct()
    {
        $this->warmupPersona();
    }

    public function stats() : Base
    {
        return $this->stats;
    }

    abstract protected function warmupPersona(): void;

    /**
     * @param $action
     * @param array|null $args
     *
     * @return mixed
     */
    public function doAction($action, ?array $args)
    {
        return (new ActionBus())($action, $args);
    }

    public function applyEffects($effects)
    {
        foreach($effects as $effect){
            if($effect instanceof PlayerEffect) {
                (new Handler())($this, $effect);
                break;
            }
        }

        return $this;
    }

    public function getDefenseValue() : int
    {
        $defenseModify = is_null($this->equips->getShield()) ? 0 : $this->equips->getShield()->getDefenseModify();

        return $this->stats->getDefenseValue($defenseModify);
    }

    public function equips() : EquipsControl
    {
        return $this->equips;
    }

    public function bag() : Bag
    {
        return $this->bag;
    }
}
