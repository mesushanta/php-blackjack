<?php

declare(strict_types=1);

class Blackjack
{
  private $player;
  private $dealer;
  private $deck;

  function __construct()
  {
      $this->deck = new Deck();
      $this->deck->shuffle();
      $this->player = new Player($this->deck);
      $this->dealer = new Dealer($this->deck);
  }

  public function getPlayer() {
    return $this->player;
  }

  public function getDealer() {
    return $this->dealer;
  }

  public function getDeck() {
    return $this->deck;
  }

  public function getResult() {
    $player_score = $this->player->getScore();
    $dealer_score = $this->dealer->getScore();
      if(!$this->player->hasLost() && !$this->dealer->hasLost()) {
        if($player_score > $dealer_score) {
          $result = "win";
        }
        else if($player_score < $dealer_score ) {
          $result = "lose";
        }

        else if($player_score == $dealer_score) {
          $result = "tie";
        }
      }

      return $result;
  }

}
