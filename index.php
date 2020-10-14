<?php
declare(strict_types=1);

//Require files to use their variables
require('Card.php');
require('Player.php');
require('Dealer.php');
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
/*    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);*/
}

whatIsHappening();

//Saving new blackjack game in session if it doesn't exist
if (!isset($_SESSION['blackjack']))
{
    $_SESSION['blackjack'] = new Blackjack();

}
//If session does exist, call it var game
$game = $_SESSION['blackjack'];

//Setting variables from
$player = $game->getPlayer();
$dealer = $game->getDealer();
$deck = $game->getDeck();
$score = $player->getScore();

if(!isset($_POST['action'])){

    echo "Game hasn't started";

} elseif ($_POST['action'] === "hit"){
    $player->hit($deck);
    $player->getScore();

    if($player->loser() == true){
        echo "Player bust";
    }

    echo "Player hit";

} elseif ($_POST['action'] === "stand"){
    $dealer->hit($deck);

    if ($dealer->loser() == true){
        echo "Dealer bust";
    } elseif ($player->getScore() == $dealer->getScore()){
        echo "Draw, dealer wins";
    } else {
        echo "Player won";
    }

    echo "Player stands";

} elseif ($_POST['action'] === "surrender"){
    $player->hasLost();

} if ($_POST['action'] === "reset"){
    session_unset();
    $game = new Blackjack();
    $_SESSION['blackjack'] = $game;
    $player = $game->getPlayer();
    $dealer = $game->getDealer();
    $deck = $game->getDeck();
    $score = $player->getScore();
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
    <style>
        #cards {
            font-size: 80px;
        }

    </style>
</head>
<body>

<form action="index.php" method="post">
    <input type="submit" name="action" value="hit">
    <input type="submit" name="action" value="stand">
    <input type="submit" name="action" value="surrender">
    <input type="submit" name="action" value="reset">

<H3>Player:</H3>
<div>

    <p id="cards">
    <?php
    foreach($player->getCards() AS $card) {
        echo $card->getUnicodeCharacter(true);
    }
    echo $player->getScore();

    ?>
    </p>
</div>

<H3>Dealer:</H3>
<div>

    <p id="cards">
        <?php
        foreach($dealer->getCards() AS $card) {
            echo $card->getUnicodeCharacter(true);
        }
        echo $dealer->getScore();

        ?>
    </p>
</div>




</body>
</html>
