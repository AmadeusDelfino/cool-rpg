<?php

require '../vendor/autoload.php';

putenv("CONFIGURATION_FILE_PATH=/home/amadeusd/Code/PHP/cool-rpg/configs");

/** @var \Adelf\CoolRPG\Player\CoolPlayer $player1 */
$player1 = (new \Adelf\CoolRPG\Generator\Player\Generate())();
$player2 = (new \Adelf\CoolRPG\Generator\Player\Generate())();

/** @var  \Adelf\CoolRPG\Personate\ActionsResults\AttackResult $p1AttackResult */
$p1AttackResult = (new \Adelf\CoolRPG\Support\Handlers\AttackAction())($player1);

$player1->applyEffects($p1AttackResult->getEffects());

var_dump($player1);