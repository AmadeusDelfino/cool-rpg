<?php

namespace Adelf\CoolRPG\Personate\ActionHandlers;

use Adelf\CoolRPG\Personate\Actions\AttackAction;
use Adelf\CoolRPG\Personate\ActionsResults\AttackResult;

class AttackHandler
{
    public function __invoke($args) : AttackResult
    {
        $action = new AttackAction();
        $result = new AttackResult();

        $action->setItem($args['item']);

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
        return $result
            ->setHit($action->hitRoll())
            ->setDamage($action->damageRoll())
            ->setDamageType($action->getItem()->damageType());
    }
}
