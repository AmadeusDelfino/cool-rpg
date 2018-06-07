<?php

namespace Adelf\CoolRPG\Personate\ActionHandlers;

use Adelf\CoolRPG\Personate\Actions\AttackAction;
use Adelf\CoolRPG\Personate\ActionsResults\AttackResult;
use Adelf\CoolRPG\Stats\Base;

class AttackHandler
{
    public function __invoke($args) : AttackResult
    {
        $action = new AttackAction();
        $result = new AttackResult();

        $action->setItem($args['item']);
        $this->defineModifiesByWeapon($action, $args['persona_stats']);

        return $this->buildResult($result, $action);
    }

    /**
     * @param AttackResult $result
     * @param AttackAction $action
     *
     * @return AttackResult
     */
    private function buildResult(AttackResult $result, AttackAction $action): AttackResult
    {
        $result
            ->setHit($action->hitRoll())
            ->setDamage($action->damageRoll())
            ->setDamageType($action->getItem()->damageType());

        if($result->getHit() === 20) {
            $result->setDamage($result->getDamage()*2);
        }

        return $result;
    }

    private function defineModifiesByWeapon(AttackAction $action, Base $stats)
    {
        if($action->getItem()->isFinesse()) {
            $action
                ->setHitModify($stats->getDexterity())
                ->setDamageModify($stats->getDexterity());

            return $action;
        }

        $action
            ->setHitModify($stats->getStrength())
            ->setDamageModify($stats->getStrength());

        return $action;
    }
}
