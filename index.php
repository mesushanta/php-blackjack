<?php
declare(strict_types=1);

require './code/Suit.php';
require './code/Card.php';
require './code/Deck.php';
require './code/Player.php';
require './code/Dealer.php';
require './code/Blackjack.php';

session_start();

// session_unset();


if(isset($_POST['restart'])) {
  unset($blackjack);
  unset($_SESSION['blackjack']);
}

if(!isset($_SESSION['blackjack']) || empty($_SESSION['blackjack'])) {
  $blackjack = new Blackjack();
  $_SESSION['blackjack'] = $blackjack;
}
else {
  $blackjack = $_SESSION['blackjack'];
}

if(isset($_POST['hit'])) {
  $blackjack->getPlayer()->hit($blackjack->getDeck());
  $_SESSION['blackjack'] = $blackjack;
}
if(isset($_POST['surrender'])) {
  $blackjack->getPlayer()->surrender();
  $_SESSION['blackjack'] = $blackjack;
}
if(isset($_POST['stand'])) {
  $blackjack->getDealer()->stand($blackjack->getDeck());
  $_SESSION['blackjack'] = $blackjack;
}

var_dump($blackjack->getDealer()->showAllCards());
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
          <h2 class="text-xl text-blue-600 text-center">DEALER</h2>

          <div class="w-full h-auto text-center">
            <?php foreach($blackjack->getDealer()->getCards() AS $i => $card) { ?>
              <?php if($blackjack->getPlayer()->hasLost() || $blackjack->getDealer()->hasLost() || $blackjack->getDealer()->showAllCards()) {
                echo '<span style="font-size: 200px; inline-block">'.$card->getUnicodeCharacter(true). '</span>';
              }  else {
              if($i == 0) { ?>
              <?php echo '<span style="font-size: 200px; inline-block">'.$card->getUnicodeCharacter(true). '</span>'; ?>
            <?php } } } ?>
            <div class="text-gray-700 text-2xl">
              Points: <?php if($blackjack->getPlayer()->hasLost() || $blackjack->getDealer()->hasLost() || $blackjack->getDealer()->showAllCards()) {  
                  echo $blackjack->getDealer()->getScore();
                }
                else {
                  echo $blackjack->getDealer()->getFirstCardOnly()->getValue();
                } ?>
            </div>

          </div>

        </div>
        <div class="col-span-1">
          <h2 class="text-xl text-blue-600 text-center">PLAYER</h2>

          <?php if($blackjack->getPlayer()->hasLost()) { ?>
            <div class="border bg-red-50 border-red-400 my-4 px-5 py-3 text-xl text-gray-700">
              You have lost.
            </div>
          <?php } ?>
          <?php if($blackjack->getDealer()->hasLost()) { ?>
            <div class="border bg-green-50 border-green-400 my-4 px-5 py-3 text-xl text-gray-700">
              You have Won.
            </div>
          <?php } ?>

          <div class="w-full h-auto text-center">
            <?php foreach($blackjack->getPlayer()->getCards() AS $card) { ?>
              <?php echo '<span style="font-size: 200px; inline-block">'.$card->getUnicodeCharacter(true). '</span>'; ?>
            <?php } ?>
            <div class="text-gray-700 text-2xl">
            Points: <?php echo $blackjack->getPlayer()->getScore(); ?>
            </div>
          </div>

          <div class="my-12 text-center">
            <form class="inline-block" method="post" action="/">
              <button class="inline-block mx-2 h-10 px-4 rounded-sm bg-blue-500 hover:bg-blue-600 border border-blue-700 text-white <?php if($blackjack->getPlayer()->hasLost() || $blackjack->getDealer()->hasLost()) echo 'hidden'; ?>" type="submit" name="hit">Hit</button>

              <button class="inline-block mx-2 h-10 px-4 rounded-sm bg-blue-500 hover:bg-blue-600 border border-blue-700 text-white <?php if($blackjack->getPlayer()->hasLost() || $blackjack->getDealer()->hasLost()) echo 'hidden'; ?>" type="submit" name="stand">Stand</button>

              <button class="inline-block mx-2 h-10 px-4 rounded-sm bg-blue-500 hover:bg-blue-600 border border-blue-700 text-white <?php if($blackjack->getPlayer()->hasLost() || $blackjack->getDealer()->hasLost()) echo 'hidden'; ?>" type="submit" name="surrender">Surrender</button>
              <button class="inline-block mx-2 h-10 px-4 rounded-sm bg-blue-500 hover:bg-blue-600 border border-blue-700 text-white" type="submit" name="restart"s>Restart</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
