<?php

namespace Adelf\CoolRPG\Stats\NPC;


use Adelf\Config\Config;
use Adelf\CoolRPG\Stats\Base;

class Stats extends Base
{
    protected function configureMaxAttributeValue()
    {
        $this->maximumAttributeValue = Config::instance()->get('stats.npc.maximum_attribute_value');
    }
}