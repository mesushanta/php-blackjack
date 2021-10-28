<?php
declare(strict_types=1);

require './code/Suit.php';
require './code/Card.php';
require './code/Deck.php';
require './code/Player.php';
require './code/Blackjack.php';

session_start();
 if(!isset($_SESSION['blackjack'])) {
   $_SESSION['blackjack'] = new Blackjack();
 }
$deck = new Deck();
$player =  new Player();
$deck->shuffle();
// $player_card = $player->getCards();
foreach($deck->getCards() AS $card) {
    echo '<span style="font-size: 100px; inline-block">'.$card->getUnicodeCharacter(true). '</span>';
}
