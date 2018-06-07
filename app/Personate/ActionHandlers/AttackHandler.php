<?php

namespace Adelf\CoolRPG\Personate\ActionHandlers;

use Adelf\CoolRPG\Effects\PlayerEffect;
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
        $playerEffect = new PlayerEffect();
        $playerEffect->lifeChange->decrease($action->damageRoll());
        $result
            ->setHit($action->hitRoll())
            ->setDamageType($action->getItem()->damageType());

        if($result->getHit() === 20) {
            $playerEffect->lifeChange->decrease($playerEffect->lifeChange->value());
        }
        $result->setEffects([$playerEffect]);

        return $result;
    }

    private function defineModifiesByWeapon(AttackAction $action, Base $stats)
    {
        if($action->getItem()->isFinesse()) {
            $action
                ->setHitModify($stats->getDexterity()/2)
                ->setDamageModify($stats->getDexterity()/2);

            return $action;
        }

        $action
            ->setHitModify($stats->getStrength()/2)
            ->setDamageModify($stats->getStrength()/2);

        return $action;
    }
}
