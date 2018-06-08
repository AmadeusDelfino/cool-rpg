<?php

namespace Adelf\CoolRPG\Personate\ActionsResults;


class AttackResult
{
    protected $hit = 0;
    protected $damageType = '';
    protected $effects = [];

    /**
     * @return string
     */
    public function getDamageType(): string
    {
        return $this->damageType;
    }

    /**
     * @param string $damageType
     *
     * @return AttackResult
     */
    public function setDamageType(string $damageType)
    {
        $this->damageType = $damageType;

        return $this;
    }

    /**
     * @return int
     */
    public function getHit(): int
    {
        return $this->hit;
    }

    /**
     * @param int $hit
     *
     * @return AttackResult
     */
    public function setHit(int $hit)
    {
        $this->hit = $hit;

        return $this;
    }

    public function setEffects(array $effects)
    {
        $this->effects = $effects;

        return $this;
    }

    public function getEffects() : array
    {
        return $this->effects;
    }
}
