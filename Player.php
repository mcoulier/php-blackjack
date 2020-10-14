<?php
declare(strict_types=1);

class Player
{
    private array $cards = [];
    private bool $lost;
    private int $score;

    //Push 2 cards in empty array
    public function __construct(Deck $deck)
    {
        array_push($this->cards, $deck->drawCard(), $deck->drawCard());
    }

    public function hit(Deck $deck)
    {
        array_push($this->cards, $deck->drawcard());
    }

    public function surrender()
    {

    }
//Don't forget to return score in this function
    public function getScore()
    {
        $score=0;
        foreach ($this->cards as $card){
            $score += $card->getValue();
        }
        return $score;

    }
    public function hasLost()
    {
        $this->lost = true;
        echo "You lost!";
    }

    public function getCards(){
        return $this->cards;
    }
}
//dealer extends player hit with parent:: if do while
