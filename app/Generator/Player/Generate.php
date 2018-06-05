<?php

namespace Adelf\CoolRPG\Generator\Player;


use Adelf\Config\Config;
use Adelf\CoolRPG\Player\CoolPlayer;

class Generate
{
    public function __invoke() : CoolPlayer
    {
        $defaultBag = Config::instance()->get('items.new_player.bag');

        $player = new CoolPlayer();

        $player->defineBag(new $defaultBag);
        $this->addDefaultItems($player);
        $this->addDefaultGolden($player);

        return $player;
    }

    private function addDefaultItems(CoolPlayer $player)
    {
        $items = Config::instance()->get('items.new_player.items');

        foreach($items as $item) {
            $player
                ->bag()
                ->add(new $item);
        }
    }

    private function addDefaultGolden(CoolPlayer $player)
    {
        $player
            ->bag()
            ->addGold(Config::instance()->get('items.new_player.gold'));
    }
}