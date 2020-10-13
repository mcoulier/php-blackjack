<?php
declare(strict_types=1);

//Require files to use their variables
require('Card.php');
require('Player.php');
require('Blackjack.php');
require('Deck.php');
require('Suit.php');

//Starting a session to save in sessions
session_start();

//Var dump function to get info
function whatIsHappening()
{
/*    echo '<h2>$_GET</h2>';
    var_dump($_GET);*/
/*    echo '<h2>$_POST</h2>';
    var_dump($_POST);*/
/*    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);*/
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

whatIsHappening();

//Saving new blackjack game in session if it doesn't exist

if (!isset($_SESSION['blackjack']))
{
    $_SESSION['blackjack'] = new Blackjack();

}

$game = $_SESSION['blackjack'];

if (!isset($_SESSION['score']))
{
    $_SESSION['score'] = 0;
}

$player = $game->getPlayer();
$dealer = $game->getDealer();
$deck = $game->getDeck();

if(!isset($_POST['action'])){

    echo "Game hasn't started";

} elseif ($_POST['action'] === "hit"){
    $player->hit($deck);
    var_dump($player->getCards());
   /*foreach($deck->getCards() AS $card) {
    echo $card->getUnicodeCharacter(true);
    echo '<br>';
    }*/

    echo "Player hit";

} elseif ($_POST['action'] === "stand"){
    echo "Player stands";

} elseif ($_POST['action'] === "surrender"){
    $player->hasLost();

} elseif ($_POST['action'] === "reset"){
    session_unset();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OOP PHP Blackjack</title>
</head>
<body>

<form action="index.php" method="post">
    <input type="submit" name="action" value="hit">
    <input type="submit" name="action" value="stand">
    <input type="submit" name="action" value="surrender">
    <input type="submit" name="action" value="reset">


</body>
</html>
