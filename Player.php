<?php
declare(strict_types=1);

class Player
{
    private array $cards = [];
    private string $lost;

    public function __construct($deck)
    {
        $deck->drawCard();
        $deck->drawCard();
    }

    public function hit()
    {

    }
    public function surrender()
    {

    }
    public function getScore()
    {

    }
    public function hasLost()
    {

    }
}