<?php

namespace Adelf\CoolRPG\Items\RulesToUse;


class ItemRules
{
    protected $playerRules = [];
    protected $placeRules = [];

    public function addPlayerRules(array $rules) : ItemRules
    {
        $this->playerRules = array_merge($this->playerRules, $rules);

        return $this;
    }

    public function addPlaceRules(array $rules) : ItemRules
    {
        $this->placeRules = array_merge($this->placeRules, $rules);

        return $this;
    }

    public function removePlayerRule(string $rule) : ItemRules
    {
        unset($this->playerRules[$rule]);

        return $this;
    }

    public function removePlaceRule(string $rule) : ItemRules
    {
        unset($this->placeRules[$rule]);

        return $this;
    }

    public function test()
    {
        dd($this->playerRules);
    }
}