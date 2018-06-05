<?php

namespace Adelf\CoolRPG\Stats;

use Adelf\Config\Config;
use Adelf\CoolRPG\Player\Level\LevelControl;
use Adelf\CoolRPG\Player\Life\LifeControl;
use Adelf\CoolRPG\Support\Handlers\CalculateLifeValue;

abstract class Base
{
    protected $strength = 0;
    protected $dexterity = 0;
    protected $charisma = 0;
    protected $faith = 0;
    protected $wisdom = 0;
    protected $intelligence = 0;
    protected $constitution = 0;

    protected $level;
    protected $life;

    protected $maximumAttributeValue;

    public function __construct()
    {
        $this->level = new LevelControl();
        $this->life = new LifeControl();

        $this->configureMaxAttributeValue();
    }

    public function calculateMaxLife()
    {
        $this->life->calculateMaxLife($this->level->getLevel(), $this->getConstitution());
    }

    abstract protected function configureMaxAttributeValue();

    public function initCommonAttributes()
    {
        $minValue = Config::instance()->get('stats.player.initial_minimum_attribute_value');
        $maxValue = Config::instance()->get('stats.player.initial_maximum_attribute_value');

        $this->strength = random_int($minValue, $maxValue);
        $this->charisma = random_int($minValue, $maxValue);
        $this->dexterity = random_int($minValue, $maxValue);
        $this->faith = random_int($minValue, $maxValue);
        $this->intelligence = random_int($minValue, $maxValue);
        $this->wisdom = random_int($minValue, $maxValue);
        $this->constitution = random_int($minValue, $maxValue);
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    /**
     * @return int
     */
    public function getCharisma(): int
    {
        return $this->charisma;
    }

    /**
     * @return int
     */
    public function getFaith(): int
    {
        return $this->faith;
    }

    /**
     * @return int
     */
    public function getWisdom(): int
    {
        return $this->wisdom;
    }

    /**
     * @return int
     */
    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    /**
     * @return int
     */
    public function getConstitution(): int
    {
        return $this->constitution;
    }

    public function addLevel()
    {
        $this->life->makeHistoryByLevel($this->level->getLevel(), $this->life->getMaxLife());

        $this->level->incrementLevel();

        $this
            ->life
            ->changeMaxLife(
                $this->life->getMaxLife() + (new CalculateLifeValue())($this->level->getLevel(), $this->getConstitution())
            );

    }

    public function life()
    {
        return $this->life;
    }

    public function level()
    {
        return $this->level;
    }
}