<?php

namespace Adelf\CoolRPG\Personate;

use Adelf\CoolRPG\Exceptions\ActionDontExistsException;
use Adelf\CoolRPG\Interfaces\ActionHandler;
use Adelf\CoolRPG\Interfaces\ActionResult;
use Adelf\CoolRPG\Personate\ActionHandlers\AttackHandler;
use Adelf\CoolRPG\Traits\InstanceOfClass;

class ActionBus
{
    use InstanceOfClass;

    const ATTACK_ACTION = 'attack';

    private $availableActions = [
        self::ATTACK_ACTION => AttackHandler::class,
    ];

    /**
     * @param $action
     * @param array|null $args
     *
     * @throws ActionDontExistsException
     *
     * @return mixed
     */
    public function __invoke($action, ?array $args = null): ActionResult
    {
        $this->validateIfActionExists($action);

        return ($this->getInstanceOfClass($this->availableActions[$action]))($args);
    }

    /**
     * @param $action
     *
     * @throws ActionDontExistsException
     */
    private function validateIfActionExists($action)
    {
        if (!isset($this->availableActions[$action])) {
            throw new ActionDontExistsException();
        }
    }
}
