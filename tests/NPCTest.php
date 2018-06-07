<?php

namespace Adelf\CoolRPG\Tests;

use Adelf\CoolRPG\Generator\NPC\Generate;
use Adelf\CoolRPG\NPC\CoolNPC;
use PHPUnit\Framework\TestCase;

class NPCTest extends TestCase
{
    public function test_if_npc_generate_works()
    {
        $player = (new Generate())();

        $this->assertInstanceOf(CoolNPC::class, $player);
    }
}
