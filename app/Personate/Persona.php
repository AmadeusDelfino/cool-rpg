<?php

namespace Adelf\CoolRPG\Personate;

use Adelf\CoolRPG\Exceptions\ActionDontExistsException;
use Adelf\CoolRPG\Effects\Base as Effect;
use Adelf\CoolRPG\Personate\EffectApply\Handler;
use Adelf\CoolRPG\Stats\Base;
use Adelf\CoolRPG\Traits\InstanceOfClass;

abstract class Persona
{
    use InstanceOfClass;

    protected $stats;

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

    public function applyEffects(Effect $effect)
    {
        (new Handler())($this, $effect);

        return $this;
    }
}
