<?php

namespace Adelf\CoolRPG\Items\Catalog;

use Adelf\CoolRPG\Interfaces\Item;
use Adelf\CoolRPG\Items\RulesToUse\Constants;
use Adelf\CoolRPG\Items\RulesToUse\ItemRules;
use Adelf\CoolRPG\Items\RulesToUse\Validator;

abstract class Base implements Item
{
    const SMALL_SIZE = 'small';
    const MEDIUM_SIZE = 'medium';
    const LARGE_SIZE = 'large';
    const VERY_LARGE_SIZE = 'very_large';

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
                    ],
                ]);
    }

    public function canUse($data) : bool
    {
        return Validator::canUse($data, $this->rulesToUse);
    }

    abstract public function effects() : array;

    protected function configureCustomRules()
    {
    }

    public function makeItemMagic()
    {
        $this->isMagic = true;

        return $this;
    }

    public function isMagic() : bool
    {
        return $this->isMagic;
    }
}
