<?php

namespace Adelf\CoolRPG\Personate\EffectApply;


use Adelf\CoolRPG\Effects\Base;
use Adelf\CoolRPG\Effects\Changes\LifeChange;
use Adelf\CoolRPG\Personate\Persona;

class Handler
{
    public function __invoke(Persona $persona, Base $effect)
    {
        if($effect instanceof LifeChange) {
            $this->applyLifeChange($persona, $effect->value());
        }
    }

    /**
     * @param Persona $persona
     * @param $value
     */
    private function applyLifeChange(Persona $persona, $value)
    {
        if($value >= 0) {
            $persona->stats()->life()->addCurrentLife($value);

            return;
        }

        if($value <= 0) {
            $persona->stats()->life()->removeCurrentLife($value);

            return;
        }

    }
}