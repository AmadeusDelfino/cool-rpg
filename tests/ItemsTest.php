<?php

namespace Adelf\CoolRPG\Tests;


use Adelf\CoolRPG\Generator\Player\Generate;
use Adelf\CoolRPG\Interfaces\Item;
use Adelf\CoolRPG\Items\Catalog\Commons\Rock;
use Adelf\CoolRPG\Items\Catalog\Potions\DeathPotion;
use Adelf\CoolRPG\Items\Catalog\Swords\LongSword;
use Adelf\CoolRPG\Items\Catalog\Swords\ShortSword;
use Adelf\CoolRPG\Player\CoolPlayer;
use Adelf\CoolRPG\Player\Equips\EquipsControl;
use Adelf\CoolRPG\Support\Handlers\CalculateLifeValue;
use PHPUnit\Framework\TestCase;

class ItemsTest extends TestCase
{
    public function player_data_provider()
    {
        return [
            [new Rock()],
            [new ShortSword()],
            [new LongSword()],
            [new DeathPotion()],
        ];
    }

    /**
     * @param Item $item
     * @dataProvider player_data_provider
     */
    public function test_if_make_item_magic_works(Item $item)
    {
        $item->makeItemMagic();

        $this->assertEquals(true, $item->isMagic());
    }

    /**
     * @param Item $item
     * @dataProvider player_data_provider
     */
    public function test_if_can_use_works(Item $item)
    {
        $this->assertEquals(true, $item->canUse([
            'player' => [
                'level' => 1
            ],
        ]));
    }

}