<?php

namespace Adelf\CoolRPG\Items\Catalog\Bags;


use Adelf\CoolRPG\Items\RulesToUse\Constants;

class CommonBag extends Base
{
    protected $space = 15;

    protected function configureCustomRules()
    {
        $this->rulesToUse->addPlayerRules([
            'level' => [
                Constants::BIGGER_OR_EQUAL => 5,
            ]
        ]);
    }
}