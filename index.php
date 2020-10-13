<?php
declare(strict_types=1);

session_start();

require('Card.php');
require('Player.php');
require('Blackjack.php');
require('Deck.php');
require('Suit.php');

function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

$blackjack = new Blackjack();
$player = $blackjack->getPlayer();
$dealer = $blackjack->getDealer();

if (!isset($_SESSION['blackjack'])) {
    $_SESSION['blackjack'] = "";
} elseif (isset($_SESSION['blackjack'])){
    $_SESSION['blackjack'] = $blackjack;
}







whatIsHappening();