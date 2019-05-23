<?php

namespace Adelf\CoolRPG\Generator\NPC;

use Adelf\CoolRPG\NPC\CoolNPC;

class Generate
{
    public function __invoke() : CoolNPC
    {
        return new CoolNPC();
    }
}
