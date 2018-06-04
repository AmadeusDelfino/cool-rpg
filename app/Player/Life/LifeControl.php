<?php

namespace Adelf\CoolRPG\Player\Life;


use Adelf\CoolRPG\Support\Handlers\CalculateLifeValue;

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
    public function getCurrentLife(): int
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

    public function changeMaxLife(int $life)
    {
        $this->maxLife = $life;

        return $this;
    }

    public function changeCurrentLife(int $life)
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
     * @return int
     */
    public function getMaxLife(): int
    {
        return $this->maxLife;
    }
}