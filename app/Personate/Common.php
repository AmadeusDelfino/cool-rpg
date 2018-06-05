<?php

namespace Adelf\CoolRPG\Personate;


use Adelf\CoolRPG\Exceptions\ActionDontExistsException;
use Adelf\CoolRPG\Traits\InstanceOfClass;

abstract class Common
{
    use InstanceOfClass;

    protected $stats;

    public function __construct()
    {
        $this->warmupPersona();
    }

    abstract protected function warmupPersona(): void;

    /**
     * @param $action
     * @param array|null $args
     * @return mixed
     * @throws ActionDontExistsException
     */
    public function doAction($action, ?array $args)
    {
        return (new ActionBus())($action, $args);
    }
}