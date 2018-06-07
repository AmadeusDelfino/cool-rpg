<?php

namespace Adelf\CoolRPG\Tests;


use Adelf\CoolRPG\Items\Catalog\Commons\Rock;
use Adelf\CoolRPG\Items\Catalog\Swords\GreaterSword;
use Adelf\CoolRPG\Items\Catalog\Swords\LongSword;
use Adelf\CoolRPG\Items\Catalog\Swords\ShortSword;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;
use PHPUnit\Framework\TestCase;

class WeaponBaseTest extends TestCase
{
    public function weapon_data_provider()
    {
        return [
            [new Rock()],
            [new ShortSword()],
            [new LongSword()],
            [new GreaterSword()],
        ];
    }

    /**
     * @param WeaponBase $weapon
     * @dataProvider weapon_data_provider
     */
    public function test_if_methods_of_weapon_base_works(WeaponBase $weapon)
    {
        $hitModify = random_int(0, 10);
        $damageModify = random_int(0, 10);
        $twoHanded = array_random([true, false]);

        $weapon
            ->setHitModify($hitModify)
            ->setDamageModify($damageModify)
            ->setTwoHanded($twoHanded);

        $this->assertEquals($hitModify, $weapon->getHitModify());
        $this->assertEquals($damageModify, $weapon->getDamageModify());
        $this->assertEquals($twoHanded, $weapon->isTwoHanded());
    }
}