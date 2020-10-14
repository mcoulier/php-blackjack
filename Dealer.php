<?php

//First write Hit function again, then write parent inside
class Dealer extends Player
{
    public function hit(Deck $deck)
    {
        while ($this->getScore() < 15){
            parent::hit($deck);
        }
    }

}