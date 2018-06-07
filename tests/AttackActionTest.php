<?php

namespace Adelf\CoolRPG\Tests;

use Adelf\CoolRPG\Generator\Player\Generate;
use Adelf\CoolRPG\Items\Catalog\Commons\Rock;
use Adelf\CoolRPG\Items\Catalog\Swords\LongSword;
use Adelf\CoolRPG\Items\Catalog\Swords\ShortSword;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;
use Adelf\CoolRPG\Personate\ActionsResults\AttackResult;
use Adelf\CoolRPG\Player\CoolPlayer;
use PHPUnit\Framework\TestCase;

class AttackActionTest extends TestCase
{
    public function attack_action_provider()
    {
        $player = (new Generate())();

        return [
            [$player, new Rock()],
            [$player, new ShortSword()],
            [$player, new LongSword()],
        ];
    }

    /**
     * @param CoolPlayer $player
     * @param WeaponBase $weapon
     * @dataProvider attack_action_provider
     */
    public function test_if_attack_action_works($player, $weapon)
    {
        $attackResult = $player->doAction('attack', ['item'=>$weapon]);

        $this->assertInstanceOf(AttackResult::class, $attackResult);
    }
}
