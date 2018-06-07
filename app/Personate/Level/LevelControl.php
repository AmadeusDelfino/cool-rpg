<?php

namespace Adelf\CoolRPG\Personate\Level;


class LevelControl
{
    protected $level = 1;
    protected $experience = 0;

    public function addExperience(float $experience)
    {
        $this->experience += $experience;

        return $this;
    }

    public function addLevel(int $level)
    {
        $this->level += $level;

        return $this;
    }

    public function incrementLevel()
    {
        $this->level++;

        return $this;
    }

    public function removeExperience(float $experience)
    {
        $this->experience -= $experience;

        return $this;
    }

    public function removeLevel(int $level)
    {
        $this->level -= $level;

        return $this;
    }

    /**
     * @return int
     */
    public function getExperience(): int
    {
        return $this->experience;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }


}