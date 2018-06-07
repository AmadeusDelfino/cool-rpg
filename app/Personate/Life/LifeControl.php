<?php

namespace Adelf\CoolRPG\Personate\Life;


use Adelf\CoolRPG\Support\Handlers\CalculateLifeValue;
use Adelf\CoolRPG\Support\Handlers\FormatFloatNumbers;

class LifeControl
{
    protected $maxLife = 0;
    protected $currentLife = 0;
    protected $historyLifeByLevel = [];

    public function makeHistoryByLevel($level, $life)
    {
        $this->historyLifeByLevel[$level] = $life;

        return $this;
    }

    public function getLifeByLevel($level)
    {
        return $this->historyLifeByLevel[$level] ?? null;
    }

    /**
     * @return int
     */
    public function getCurrentLife(): float
    {
        return $this->currentLife;
    }

    /**
     * @return array
     */
    public function getHistoryLifeByLevel(): array
    {
        return $this->historyLifeByLevel;
    }

    public function changeMaxLife(float $life)
    {
        $this->maxLife = $life;

        return $this;
    }

    public function changeCurrentLife(float $life)
    {
        $this->currentLife = $life;

        return $this;
    }

    public function addCurrentLife(int $life)
    {
        $this->currentLife += $life;

        return $this;
    }

    public function removeCurrentLife(int $life)
    {
        $this->currentLife -= $life;

        return $this;
    }

    public function calculateMaxLife($level, $con)
    {
        $this->maxLife = (new CalculateLifeValue())($level, $con);
    }

    /**
     * @return float
     */
    public function getMaxLife(): float
    {
        return (new FormatFloatNumbers())($this->maxLife);
    }
}