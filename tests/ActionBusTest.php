<?php

namespace Adelf\CoolRPG\Tests;

use Adelf\CoolRPG\Exceptions\ActionDontExistsException;
use Adelf\CoolRPG\Items\Catalog\Commons\Rock;
use Adelf\CoolRPG\Items\Catalog\Swords\Dagger;
use Adelf\CoolRPG\Items\Catalog\Swords\GreaterSword;
use Adelf\CoolRPG\Items\Catalog\Swords\LongSword;
use Adelf\CoolRPG\Items\Catalog\Swords\ShortSword;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;
use Adelf\CoolRPG\Personate\ActionBus;
use Adelf\CoolRPG\Personate\Actions\AttackAction;
use Adelf\CoolRPG\Personate\Actions\Base;
use Adelf\CoolRPG\Personate\ActionsResults\AttackResult;
use Adelf\CoolRPG\Stats\Player\Stats;
use PHPUnit\Framework\TestCase;

class ActionBusTest extends TestCase
{
    public function action_bus_for_attack_provider()
    {
        return [
            [new ActionBus(), new Rock()],
            [new ActionBus(), new ShortSword()],
            [new ActionBus(), new Dagger()],
            [new ActionBus(), new LongSword()],
            [new ActionBus(), new GreaterSword()],
        ];
    }

    public function action_class_with_item_provider()
    {
        return [
            [new AttackAction(), new Rock()],
            [new AttackAction(), new ShortSword()],
            [new AttackAction(), new Dagger()],
            [new AttackAction(), new LongSword()],
            [new AttackAction(), new GreaterSword()],
        ];
    }

    /**
     * @param ActionBus  $bus
     * @param WeaponBase $weapon
     *
     * @throws \Adelf\CoolRPG\Exceptions\ActionDontExistsException
     * @dataProvider action_bus_for_attack_provider
     */
    public function test_if_attack_action_works(ActionBus $bus, WeaponBase $weapon)
    {
        /** @var AttackResult $result */
        $result = $bus('attack', ['item'=> $weapon, 'persona_stats' => new Stats()]);

        $this->assertEquals($weapon->damageType(), $result->getDamageType());
        $this->assertNotEquals(0, $result->getHit());
        $this->assertNotEquals(0, $result->getDamage());
    }

    /**
     * @param ActionBus  $bus
     * @param WeaponBase $weapon
     *
     * @throws \Adelf\CoolRPG\Exceptions\ActionDontExistsException
     * @dataProvider action_bus_for_attack_provider
     */
    public function test_if_action_dont_exists_throw_exception(ActionBus $bus, WeaponBase $weapon)
    {
        $this->expectException(ActionDontExistsException::class);
        $bus('nooooooooooothing', ['item'=> $weapon]);
    }

    /**
     * @param Base       $action
     * @param WeaponBase $weapon
     * @dataProvider action_class_with_item_provider
     */
    public function test_if_action_item_manipulation_works(Base $action, WeaponBase $weapon)
    {
        $action->setItem($weapon);

        $this->assertEquals($weapon, $action->getItem());
    }
}
