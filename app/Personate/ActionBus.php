<?php

namespace Adelf\CoolRPG\Personate;


use Adelf\CoolRPG\Exceptions\ActionDontExistsException;
use Adelf\CoolRPG\Personate\ActionHandlers\AttackHandler;
use Adelf\CoolRPG\Traits\InstanceOfClass;

class ActionBus
{
    use InstanceOfClass;

    private static $availableActions = [
        'attack' => AttackHandler::class,
    ];


    /**
     * @param $action
     * @param array|null $args
     * @return mixed
     * @throws ActionDontExistsException
     */
    public function __invoke($action, ?array $args)
    {
        $this->validateIfActionExists($action);

        return ($this->getInstanceOfClass(self::$availableActions[$action]))($args);
    }

    /**
     * @param $action
     * @throws ActionDontExistsException
     */
    private function validateIfActionExists($action)
    {
        if(!isset(self::$availableActions[$action])) {
            throw new ActionDontExistsException();
        }
    }
}