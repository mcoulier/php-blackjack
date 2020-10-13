<?php
declare(strict_types=1);

class Player
{
    private array $cards = [];
    private bool $lost;

    public function __construct(Deck $deck)
    {
        $this->cards= [];
        array_push($this->cards, $deck->drawCard(), $deck->drawCard());
    }

    public function hit(Deck $deck)
    {
        array($this->cards, $deck->drawcard());
    }
    public function surrender()
    {

    }
    public function getScore()
    {

    }
    public function hasLost()
    {
        $this->lost = true;
        echo "You lost!";
    }
}