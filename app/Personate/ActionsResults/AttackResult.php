<?php

namespace Adelf\CoolRPG\Personate\ActionsResults;


use Adelf\CoolRPG\Interfaces\ActionResult;

class AttackResult implements ActionResult
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
    public function setDamageType(string $damageType) : AttackResult
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
    public function setHit(int $hit) : AttackResult
    {
        $this->hit = $hit;

        return $this;
    }

    public function setEffects(array $effects) : AttackResult
    {
        $this->effects = $effects;

        return $this;
    }

    public function getEffects() : array
    {
        return $this->effects;
    }
}
