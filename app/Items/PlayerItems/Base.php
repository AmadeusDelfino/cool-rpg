<?php

namespace Adelf\CoolRPG\Items\PlayerItems;


use Adelf\CoolRPG\Interfaces\EffectItem;
use Adelf\CoolRPG\Interfaces\Item;
use Adelf\CoolRPG\Items\RulesToUse\Constants;
use Adelf\CoolRPG\Items\RulesToUse\ItemRules;
use Adelf\CoolRPG\Items\RulesToUse\Validator;

abstract class Base implements Item
{
    protected $name;
    protected $description;
    protected $isMagic = false;
    protected $rulesToUse;

    public function __construct()
    {
        $this->rulesToUse = new ItemRules();
        $this->addDefaultRules();
        $this->configureCustomRules();
    }

    private function addDefaultRules() : void
    {
        $this
            ->rulesToUse
            ->addPlayerRules(
                [
                    'level' => [
                        Constants::BIGGER_OR_EQUAL => '1',
                    ],
                    'life' => [
                        Constants::BIGGER_OR_EQUAL => '1',
                    ]
                ]);
    }

    public function canUse($data) : bool
    {
        return Validator::canUse($data, $this->rulesToUse);
    }

    abstract public function effect() : array;

    protected function configureCustomRules(){}

    protected function makeItemMagic()
    {
        $this->isMagic = true;

        return $this;
    }

    protected function isMagic() : bool
    {
        return $this->isMagic;
    }
}