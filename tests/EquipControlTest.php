<?php

namespace Adelf\CoolRPG\Tests;


use Adelf\CoolRPG\Exceptions\CantUseShieldException;
use Adelf\CoolRPG\Exceptions\CantUseTwoHandedWeaponException;
use Adelf\CoolRPG\Items\Catalog\Commons\Rock;
use Adelf\CoolRPG\Items\Catalog\Shields\BucklerShield;
use Adelf\CoolRPG\Items\Catalog\Shields\LargeShield;
use Adelf\CoolRPG\Items\Catalog\Shields\TowerShield;
use Adelf\CoolRPG\Items\Catalog\Swords\Dagger;
use Adelf\CoolRPG\Items\Catalog\Swords\GreaterSword;
use Adelf\CoolRPG\Items\Catalog\Swords\LongSword;
use Adelf\CoolRPG\Items\Catalog\Swords\ShortSword;
use Adelf\CoolRPG\Items\Catalog\WeaponBase;
use Adelf\CoolRPG\Player\Equips\EquipsControl;
use PHPUnit\Framework\TestCase;

class EquipControlTest extends TestCase
{
    public function equip_control_with_one_handed_weapon_data_provider()
    {
        return [
            [new EquipsControl(), new Rock()],
            [new EquipsControl(), new ShortSword()],
            [new EquipsControl(), new LongSword()],
        ];
    }

    public function equip_control_with_two_handed_weapon_with_shield_data_provider()
    {
        return [
            [new EquipsControl(), new GreaterSword(), new BucklerShield()],
            [new EquipsControl(), new GreaterSword(), new TowerShield()],
        ];
    }

    public function equip_control_large_shield_with_small_weapon_data_provider()
    {
        return [
            [new EquipsControl(), new Dagger(), new LargeShield()],
            [new EquipsControl(), new Dagger(), new TowerShield()],
        ];
    }

    public function equip_control_large_shield_with_not_small_weapon_data_provider()
    {
        return [
            [new EquipsControl(), new LongSword(), new LargeShield()],
            [new EquipsControl(), new GreaterSword(), new LargeShield()],
            [new EquipsControl(), new LongSword(), new TowerShield()],
            [new EquipsControl(), new GreaterSword(), new TowerShield()],
        ];
    }

    /**
     * @param EquipsControl $control
     * @param WeaponBase $weaponBase
     * @dataProvider equip_control_with_one_handed_weapon_data_provider
     */
    public function test_if_use_weapon_works(EquipsControl $control, WeaponBase $weaponBase)
    {
        $control->useWeapon($weaponBase);

        $this->assertInstanceOf(get_class($weaponBase), $control->getWeapon());
    }

    /**
     * @param EquipsControl $control
     * @param WeaponBase $weaponBase
     * @throws \Adelf\CoolRPG\Exceptions\CantUseShieldException
     * @throws \Adelf\CoolRPG\Exceptions\CantUseTwoHandedWeaponException
     * @dataProvider equip_control_with_two_handed_weapon_with_shield_data_provider
     */
    public function test_if_use_two_handed_weapon_with_shield_throw_exception(EquipsControl $control, WeaponBase $weaponBase, $shield)
    {
        $this->expectException(CantUseTwoHandedWeaponException::class);
        $control->useShield($shield);
        $control->useWeapon($weaponBase);

        $this->assertInstanceOf(get_class($weaponBase), $control->getWeapon());
    }

    /**
     * @param EquipsControl $control
     * @param WeaponBase $weaponBase
     * @param $shield
     * @throws CantUseShieldException
     * @throws CantUseTwoHandedWeaponException
     * @dataProvider equip_control_with_two_handed_weapon_with_shield_data_provider
     */
    public function test_if_use_shield_weapon_with_two_headed_weapon_throw_exception(EquipsControl $control, WeaponBase $weaponBase, $shield)
    {
        $this->expectException(CantUseShieldException::class);
        $control->useWeapon($weaponBase);
        $control->useShield($shield);

        $this->assertInstanceOf(get_class($weaponBase), $control->getWeapon());
    }

    /**
     * @param EquipsControl $control
     * @param WeaponBase $weaponBase
     * @param $shield
     * @throws CantUseShieldException
     * @throws CantUseTwoHandedWeaponException
     * @dataProvider equip_control_large_shield_with_small_weapon_data_provider
     */
    public function test_if_use_large_shield_with_small_weapon_works(EquipsControl $control, WeaponBase $weaponBase, $shield)
    {
        $control->useWeapon($weaponBase);
        $control->useShield($shield);

        $this->assertInstanceOf(get_class($weaponBase), $control->getWeapon());
    }

    /**
     * @param EquipsControl $control
     * @param WeaponBase $weaponBase
     * @param $shield
     * @throws CantUseShieldException
     * @throws CantUseTwoHandedWeaponException
     * @dataProvider equip_control_large_shield_with_not_small_weapon_data_provider
     */
    public function test_if_use_large_shield_with_not_small_weapon_throw_exception(EquipsControl $control, WeaponBase $weaponBase, $shield)
    {
        $this->expectException(CantUseShieldException::class);
        $control->useWeapon($weaponBase);
        $control->useShield($shield);

        $this->assertInstanceOf(get_class($weaponBase), $control->getWeapon());
    }
}