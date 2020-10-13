<?php
declare(strict_types=1);

class Blackjack
{
    private $player;
    private $dealer;
    private $deck;

    public function getPlayer(): Player
    {
        return $this->player;
    }
    public function getDealer()
    {
        return $this->dealer;
    }

    public function __construct()
    {
        $this->player = new Player($this->deck);
        $this->dealer = new Player($this->deck);
        $this->deck = new Deck;
        $this->deck->shuffle();
    }
}