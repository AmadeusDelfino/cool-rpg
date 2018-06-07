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

    protected $strengthNeeded = 0;
    protected $dexterityNeeded = 0;
    protected $charismaNeeded = 0;
    protected $faithNeeded = 0;
    protected $wisdomNeeded = 0;
    protected $intelligenceNeeded = 0;
    protected $constitutionNeeded = 0;
    protected $levelNeeded = 0;

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
                    Constants::LEVEL => [
                        Constants::BIGGER_OR_EQUAL => $this->levelNeeded,
                    ],
                    Constants::STRENGTH => [
                        Constants::BIGGER_OR_EQUAL => $this->strengthNeeded,
                    ],
                    Constants::DEXTERITY => [
                        Constants::BIGGER_OR_EQUAL => $this->dexterityNeeded,
                    ],
                    Constants::CHARISMA => [
                        Constants::BIGGER_OR_EQUAL => $this->charismaNeeded,
                    ],
                    Constants::FAITH => [
                        Constants::BIGGER_OR_EQUAL => $this->faithNeeded,
                    ],
                    Constants::WISDOM => [
                        Constants::BIGGER_OR_EQUAL => $this->wisdomNeeded,
                    ],
                    Constants::INTELLIGENCE => [
                        Constants::BIGGER_OR_EQUAL => $this->intelligenceNeeded,
                    ],
                    Constants::CONSTITUTION => [
                        Constants::BIGGER_OR_EQUAL => $this->constitutionNeeded,
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
