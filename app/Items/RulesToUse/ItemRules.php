<?php

namespace Adelf\CoolRPG\Items\RulesToUse;

class ItemRules
{
    protected $playerRules = [];
    protected $placeRules = [];

    public function addPlayerRules(array $rules) : self
    {
        $this->playerRules = array_merge($this->playerRules, $rules);

        return $this;
    }

    public function addPlaceRules(array $rules) : self
    {
        $this->placeRules = array_merge($this->placeRules, $rules);

        return $this;
    }

    public function removePlayerRule(string $rule) : self
    {
        unset($this->playerRules[$rule]);

        return $this;
    }

    public function removePlaceRule(string $rule) : self
    {
        unset($this->placeRules[$rule]);

        return $this;
    }

    public function test()
    {
        dd($this->playerRules);
    }
}
