<?php

namespace Adelf\CoolRPG\Tests;


use Adelf\CoolRPG\Personate\Life\LifeControl;
use PHPUnit\Framework\TestCase;

class LifeTest extends TestCase
{
    public function life_control_data_provider()
    {
        return [
            [new LifeControl()],
            [new LifeControl()],
            [new LifeControl()],
            [new LifeControl()],
            [new LifeControl()],
        ];
    }

    public function life_control_with_random_life_data_provider()
    {
        return [
            [(new LifeControl())->addCurrentLife(random_int(1, 100))],
            [(new LifeControl())->addCurrentLife(random_int(1, 100))],
            [(new LifeControl())->addCurrentLife(random_int(1, 100))],
            [(new LifeControl())->addCurrentLife(random_int(1, 100))],
            [(new LifeControl())->addCurrentLife(random_int(1, 100))],
        ];
    }

    public function life_control_with_life_history_data_provider()
    {
        $levelAndLife = [
            [
                random_int(1, 10),
                random_int(1, 10),
            ],
            [
                random_int(1, 10),
                random_int(1, 10),
            ],
            [
                random_int(1, 10),
                random_int(1, 10),
            ],
            [
                random_int(1, 10),
                random_int(1, 10),
            ],
            [
                random_int(1, 10),
                random_int(1, 10),
            ],
        ];
        return [
            [(new LifeControl())->makeHistoryByLevel($levelAndLife[0][0], $levelAndLife[0][1]), $levelAndLife[0][0], $levelAndLife[0][1]],
            [(new LifeControl())->makeHistoryByLevel($levelAndLife[1][0], $levelAndLife[1][1]), $levelAndLife[1][0], $levelAndLife[1][1]],
            [(new LifeControl())->makeHistoryByLevel($levelAndLife[2][0], $levelAndLife[2][1]), $levelAndLife[2][0], $levelAndLife[2][1]],
            [(new LifeControl())->makeHistoryByLevel($levelAndLife[3][0], $levelAndLife[3][1]), $levelAndLife[3][0], $levelAndLife[3][1]],
            [(new LifeControl())->makeHistoryByLevel($levelAndLife[4][0], $levelAndLife[4][1]), $levelAndLife[4][0], $levelAndLife[4][1]],
        ];
    }

    public function test_if_instantiate_life_control_works()
    {
        $lifeControl = new LifeControl();

        $this->assertInstanceOf(LifeControl::class, $lifeControl);
    }

    /**
     * @param LifeControl $lifeControl
     * @dataProvider life_control_data_provider
     */
    public function test_add_life_works(LifeControl $lifeControl)
    {
        $addLife = random_int(1, 100);
        $lifeControl->addCurrentLife($addLife);

        $this->assertEquals($addLife, $lifeControl->getCurrentLife());
    }

    /**
     * @param LifeControl $lifeControl
     * @dataProvider life_control_with_random_life_data_provider
     */
    public function test_remove_life_works(LifeControl $lifeControl)
    {
        $currentLife = $lifeControl->getCurrentLife();
        $removedLife = random_int(1, 100);
        $lifeControl->removeCurrentLife($removedLife);

        $this->assertEquals($currentLife-$removedLife, $lifeControl->getCurrentLife());
    }

    /**
     * @param LifeControl $lifeControl
     * @param $level
     * @param $life
     * @dataProvider life_control_with_life_history_data_provider
     */
    public function test_if_life_by_level_history_works(LifeControl $lifeControl, $level, $life)
    {
        $this->assertEquals($life, $lifeControl->getLifeByLevel($level));
    }

    /**
     * @param LifeControl $lifeControl
     * @param $level
     * @param $life
     * @dataProvider life_control_with_life_history_data_provider
     */
    public function test_if_all_history_life_by_level_works(LifeControl $lifeControl, $level, $life)
    {
        $this->assertInternalType('array', $lifeControl->getHistoryLifeByLevel());
    }
}