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

$blackjack = new Blackjack();
$player = $blackjack->getPlayer();
$dealer = $blackjack->getDealer();
$deck = $blackjack->getDeck();
// 
// var_dump($player->getCards());
// 
// foreach($player->getCards() As $card) {
//   echo $card->name.'<br>';
// }
// echo $dealer->getScore().'<br>'; 
// echo $player->getScore();

    // echo '<span style="font-size: 100px; inline-block">'.$card->getUnicodeCharacter(true). '</span>';

// $deck->shuffle();
// // $player_card = $player->getCards();
// foreach($player->getCards() AS $card) {
// 
// }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Blackjack</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css" integrity="sha512-yXagpXH0ulYCN8G/Wl7GK+XIpdnkh5fGHM5rOzG8Kb9Is5Ua8nZWRx5/RaKypcbSHc56mQe0GBG0HQIGTmd8bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    
    <div class="w-full max-w-screen-xl mx-auto my-20 border-4 px-8 py-8 border-red-500">
      
      <div class=" grid grid-cols-2 gap-8">
        <div class="col-span-1">
          <h2 class="text-xl text-blue-600">DEALER</h2>
          
          <div class="w-full h-auto text-center">
            <?php foreach($dealer->getCards() AS $i => $card) { ?>
              <?php if($i == 0) { ?>
              <?php echo '<span style="font-size: 100px; inline-block">'.$card->getUnicodeCharacter(true). '</span>'; ?>
            <?php } } ?>
            Points: <?php echo $dealer->getDealerInitialScore(); ?>
          </div>
          
        </div>
        <div class="col-span-1">
          <h2 class="text-xl text-blue-600">PLAYER</h2>
          
          <div class="w-full h-auto text-center">
            <?php foreach($player->getCards() AS $card) { ?>
              <?php echo '<span style="font-size: 100px; inline-block">'.$card->getUnicodeCharacter(true). '</span>'; ?>
            <?php } ?>
            Points: <?php echo $player->getScore(); ?>
          </div>
          
          <div class="">
            <a href="/call=hit"><button type="button" name="button"></button></a>
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>
