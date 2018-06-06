<?php

namespace Adelf\CoolRPG\Tests;


use Adelf\CoolRPG\Stats\Base;
use Adelf\CoolRPG\Stats\NPC\Stats as NPCStats;
use Adelf\CoolRPG\Stats\Player\Stats as PlayerStats;
use PHPUnit\Framework\TestCase;

class StatsTest extends TestCase
{
    public function stats_data_provider()
    {
        return [

            [new PlayerStats()],
            [new PlayerStats()],
            [new PlayerStats()],
            [new PlayerStats()],
            [new PlayerStats()],

            [new NPCStats()],
            [new NPCStats()],
            [new NPCStats()],
            [new NPCStats()],
            [new NPCStats()],
        ];
    }

    /**
     * @param Base $stats
     * @dataProvider stats_data_provider
     */
    public function test_if_init_stats_works(Base $stats)
    {
        $stats->initCommonAttributes();

        $this->assertNotEquals(0, $stats->getDexterity());
        $this->assertNotEquals(0, $stats->getConstitution());
        $this->assertNotEquals(0, $stats->getCharisma());
        $this->assertNotEquals(0, $stats->getFaith());
        $this->assertNotEquals(0, $stats->getIntelligence());
        $this->assertNotEquals(0, $stats->getStrength());
        $this->assertNotEquals(0, $stats->getWisdom());
    }

    /**
     * @param Base $stats
     * @dataProvider stats_data_provider
     */
    public function test_level_interaction(Base $stats)
    {
        $stats->level()->addLevel(10);
        $this->assertEquals(11, $stats->level()->getLevel());

        $stats->level()->removeLevel(5);
        $this->assertEquals(6, $stats->level()->getLevel());

        $stats->level()->incrementLevel();
        $this->assertEquals(7, $stats->level()->getLevel());
    }
}