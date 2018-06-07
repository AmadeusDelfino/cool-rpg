<?php

namespace Adelf\CoolRPG\Tests;


use Adelf\CoolRPG\Generator\Player\Generate;
use Adelf\CoolRPG\Personate\Equips\EquipsControl;
use Adelf\CoolRPG\Player\CoolPlayer;
use Adelf\CoolRPG\Support\Handlers\CalculateLifeValue;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function player_data_provider()
    {
        return [
            [new CoolPlayer()],
            [new CoolPlayer()],
            [new CoolPlayer()],
            [new CoolPlayer()],
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

    public function test_if_player_generate_works()
    {
        $player = (new Generate())();

        $this->assertInstanceOf(CoolPlayer::class, $player);
    }

    /**
     * @param CoolPlayer $player
     * @dataProvider player_data_provider
     */
    public function test_if_player_defense_calc_works(CoolPlayer $player)
    {
        $defense = $player->getDefenseValue();
        $currentDex = $player->stats()->getDexterity();

        $this->assertEquals($currentDex, $defense);
    }

    /**
     * @param $player
     * @dataProvider player_data_provider
     */
    public function test_if_add_level_works(CoolPlayer $player)
    {
        $levelUp = random_int(1, 20);
        $player->levelUp($levelUp);
        $this->assertEquals(1+$levelUp, $player->stats()->level()->getLevel());
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

    /**
     * @param CoolPlayer $player
     * @dataProvider player_data_provider
     */
    public function test_if_equips_wrapper_works(CoolPlayer $player)
    {
        $this->assertInstanceOf(
            EquipsControl::class,
            $player->equips()
        );
    }

    /**
     * @param CoolPlayer $player
     * @dataProvider player_data_provider
     */
    public function test_if_add_experience_works(CoolPlayer $player)
    {
        $newExperience = random_int(1, 10000);
        $player->stats()->level()->addExperience($newExperience);

        $this->assertEquals($newExperience, $player->stats()->level()->getExperience());
    }

    /**
     * @param CoolPlayer $player
     * @dataProvider player_data_provider
     */
    public function test_if_remove_experience_works(CoolPlayer $player)
    {
        $newExperience = random_int(1000, 10000);
        $removedExperience = random_int(1, 1000);
        $player->stats()->level()->addExperience($newExperience);
        $player->stats()->level()->removeExperience($removedExperience);

        $this->assertEquals($newExperience - $removedExperience, $player->stats()->level()->getExperience());
    }
}