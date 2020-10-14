<?php
declare(strict_types=1);

class Player
{

    //Set lost value to false, no value gives error
    private array $cards = [];
    private bool $lost = false;

    //Push 2 cards in empty array
    public function __construct(Deck $deck)
    {
        array_push($this->cards, $deck->drawCard(), $deck->drawCard());
    }

    public function hit(Deck $deck)
    {
        array_push($this->cards, $deck->drawcard());

        if ($this->getScore() > 21){
            $this->hasLost();
        }
    }

    public function surrender()
    {

    }
//Don't forget to set & return score in this function
    public function getScore()
    {
        $score = 0;
        foreach ($this->cards as $card){
            $score += $card->getValue();
        }
        return $score;

    }

    public function hasLost()
    {
        $this->lost = true;
    }

    public function loser(){
        return $this->lost;
    }

    public function getCards(){
        return $this->cards;
    }
}
