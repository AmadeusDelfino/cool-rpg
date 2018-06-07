<?php

namespace Adelf\CoolRPG\Tests;

use Adelf\CoolRPG\Generator\Player\Generate;
use Adelf\CoolRPG\Items\Catalog\Commons\Rock;
use Adelf\CoolRPG\Items\Catalog\Swords\LongSword;
use Adelf\CoolRPG\Items\Catalog\Swords\ShortSword;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;
use Adelf\CoolRPG\Personate\ActionsResults\AttackResult;
use Adelf\CoolRPG\Player\CoolPlayer;
use Adelf\CoolRPG\Stats\NPC\Stats;
use Adelf\CoolRPG\Stats\Player\Stats as PlayerStats;
use PHPUnit\Framework\TestCase;

class AttackActionTest extends TestCase
{
    public function attack_action_provider()
    {
        $player = (new Generate())();

        return [
            [$player, new Rock(), new Stats()],
            [$player, new ShortSword(), new PlayerStats()],
            [$player, new LongSword(), new Stats()],
        ];
    }

    /**
     * @param CoolPlayer $player
     * @param WeaponBase $weapon
     * @param $stats
     * @dataProvider attack_action_provider
     */
    public function test_if_attack_action_works($player, $weapon, $stats)
    {
        $attackResult = $player->doAction('attack', ['item'=>$weapon, 'persona_stats' => $stats]);

        $this->assertInstanceOf(AttackResult::class, $attackResult);
    }
}
