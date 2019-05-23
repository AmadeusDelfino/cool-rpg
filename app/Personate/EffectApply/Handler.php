<?php

namespace Adelf\CoolRPG\Personate\EffectApply;


use Adelf\CoolRPG\Effects\Base;
use Adelf\CoolRPG\Effects\Changes\LifeChange;
use Adelf\CoolRPG\Interfaces\EffectChanges;
use Adelf\CoolRPG\Personate\Persona;
use function dd;
use function var_dump;

class Handler
{
    public function __invoke(Persona $persona, Base $effect)
    {
        $this->applyLifeChange($persona, $effect->lifeChange);
    }

    /**
     * @param Persona $persona
     * @param $value
     */
    private function applyLifeChange(Persona $persona, EffectChanges $value)
    {
        if($value >= 0) {
            $persona->stats()->life()->addCurrentLife($value->value());

            return;
        }

        if($value <= 0) {
            $persona->stats()->life()->removeCurrentLife($value->value());

            return;
        }

    }
}