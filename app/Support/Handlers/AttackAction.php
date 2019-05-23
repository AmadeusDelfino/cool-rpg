<?php

namespace Adelf\CoolRPG\Support\Handlers;


use Adelf\CoolRPG\Personate\ActionBus;
use Adelf\CoolRPG\Personate\Persona;

class AttackAction
{
    public function __invoke(Persona $persona)
    {
        return $persona->doAction(ActionBus::ATTACK_ACTION, [
            'item' => $persona->equips()->getWeapon(),
            'persona_stats' => $persona->stats(),
        ]);
    }
}