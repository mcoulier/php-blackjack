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
/*    echo '<h2>$_GET</h2>';
    var_dump($_GET);*/
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
/*    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);*/
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
whatIsHappening();

$blackjack = new Blackjack();
$player = $blackjack->getPlayer();
$dealer = $blackjack->getDealer();

if (!isset($_SESSION['blackjack'])) {
    $_SESSION['blackjack'] = new Blackjack();
}

if(!isset($_POST['action'])){
    echo "game hasn't started";

} elseif ($_POST['action'] === "hit"){
    $player->hit();

} elseif ($_POST['action'] === "surrender"){
    $player->hasLost();

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

</body>
</html>
