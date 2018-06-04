<?php

namespace Adelf\CoolRPG\Tests;


use Adelf\CoolRPG\Player\CoolPlayer;
use Adelf\CoolRPG\Support\Handlers\CalculateLifeValue;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function player_data_provider()
    {
        return [
            [new CoolPlayer()],
        ];
    }

    /**
     * @param $player
     * @dataProvider player_data_provider
     */
    public function test_if_new_player_works(CoolPlayer $player)
    {
        $this->assertInstanceOf(CoolPlayer::class, $player);
    }

    /**
     * @param $player
     * @dataProvider player_data_provider
     */
    public function test_if_add_level_works(CoolPlayer $player)
    {
        $player->levelUp();
        $this->assertEquals(2, $player->stats()->level()->getLevel());
    }

    /**
     * @param $player
     * @dataProvider player_data_provider
     */
    public function test_if_level_up_life_increment_work(CoolPlayer $player)
    {
        $currentMaxLife = $player->stats()->life()->getMaxLife();
        $player->levelUp();

        $this->assertEquals($currentMaxLife + (new CalculateLifeValue())($player->stats()->level()->getLevel(), $player->stats()->getConstitution()), $player->stats()->life()->getMaxLife());
    }
}