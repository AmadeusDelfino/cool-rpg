<?php

namespace Adelf\CoolRPG\Items\Catalog\Bags;

use Adelf\CoolRPG\Items\RulesToUse\Constants;

class LuxuryBag extends Base
{
    protected $space = 30;

    protected function configureCustomRules()
    {
        $this->rulesToUse->addPlayerRules([
            'level' => [
                Constants::BIGGER_OR_EQUAL => 10,
            ],
        ]);
    }
}
