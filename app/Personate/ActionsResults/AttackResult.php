<?php

namespace Adelf\CoolRPG\Personate\ActionsResults;

class AttackResult
{
    protected $hit = 0;
    protected $damage = 0;
    protected $damageType = '';

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     *
     * @return AttackResult
     */
    public function setDamage(int $damage)
    {
        $this->damage = $damage;

        return $this;
    }

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
}
