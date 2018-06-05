<?php

namespace Adelf\CoolRPG\Tests;


use Adelf\CoolRPG\Generator\NPC\Generate;
use Adelf\CoolRPG\NPC\CoolNPC;
use PHPUnit\Framework\TestCase;

class NPCTest extends TestCase
{
    public function player_data_provider()
    {
        return [
            [new CoolNPC()],
            [new CoolNPC()],
            [new CoolNPC()],
            [new CoolNPC()],
            [new CoolNPC()],
        ];
    }

    /**
     * @param $player
     * @dataProvider player_data_provider
     */
    public function test_if_new_npc_works(CoolNPC $player)
    {
        $this->assertInstanceOf(CoolNPC::class, $player);
    }

    public function test_if_npc_generate_works()
    {
        $player = (new Generate())();

        $this->assertInstanceOf(CoolNPC::class, $player);
    }
}