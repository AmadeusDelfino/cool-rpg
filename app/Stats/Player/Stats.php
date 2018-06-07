<?php

namespace Adelf\CoolRPG\Stats\Player;

use Adelf\Config\Config;
use Adelf\CoolRPG\Stats\Base;

class Stats extends Base
{
    protected function configureMaxAttributeValue()
    {
        $this->maximumAttributeValue = Config::instance()->get('stats.player.maximum_attribute_value');
    }
}
