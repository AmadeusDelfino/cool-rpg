<?php

namespace Adelf\CoolRPG\Effects;

use Adelf\CoolRPG\Interfaces\EffectItem;
use Adelf\CoolRPG\Effects\Changes\DefenseChange;
use Adelf\CoolRPG\Effects\Changes\ExperienceChange;
use Adelf\CoolRPG\Effects\Changes\LevelChange;
use Adelf\CoolRPG\Effects\Changes\LifeChange;

abstract class Base implements EffectItem
{
    public $lifeChange;
    public $experienceChange;
    public $levelChange;
    public $defenseChange;

    public function __construct()
    {
        $this->lifeChange = new LifeChange();
        $this->experienceChange = new ExperienceChange();
        $this->levelChange = new LevelChange();
        $this->defenseChange = new DefenseChange();
    }
}
