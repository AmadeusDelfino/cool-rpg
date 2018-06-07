<?php

namespace Adelf\CoolRPG\Tests;

use Adelf\CoolRPG\Items\Catalog\ShieldBase;
use Adelf\CoolRPG\Items\Catalog\Shields\BucklerShield;
use Adelf\CoolRPG\Items\Catalog\Shields\LargeShield;
use Adelf\CoolRPG\Items\Catalog\Shields\RoundShield;
use Adelf\CoolRPG\Items\Catalog\Shields\TowerShield;
use PHPUnit\Framework\TestCase;

class ShieldBaseTest extends TestCase
{
    public function shield_data_provider()
    {
        return [
            [new LargeShield()],
            [new TowerShield()],
            [new BucklerShield()],
            [new RoundShield()],
        ];
    }

    /**
     * @param ShieldBase $shield
     * @dataProvider shield_data_provider
     */
    public function test_if_methods_of_shield_base_works(ShieldBase $shield)
    {
        $defenseModify = random_int(1, 10);

        $shield->setDefenseModify($defenseModify);

        $this->assertEquals($defenseModify, $shield->getDefenseModify());
        $this->assertInternalType('string', $shield->size());
    }
}
