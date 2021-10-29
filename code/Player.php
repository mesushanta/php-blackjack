<?php

declare(strict_types=1);

class Player
{

  private $cards = [];
  private $lost = false;

  function __construct($deck)
  {
    for($i=0; $i<2; $i++) {
      $this->cards[] = $deck->drawCard();
    }
  }

  public function hit($deck) {
    $this->cards[] = $deck->drawCard();
    $score = $this->getScore();
    if($score > 21) {
      $this->lost = true;
    }
  }

  public function surrender() : bool {
    $this->lost = true;
  }

  public function hasLost() : bool {
    return $this->lost;
  }

  public function getScore() : int {
    $score = 0;
      foreach ($this->cards as $card) {
        $score += $card->getValue();
      }
    return $score;
  }


  public function getFirstCardOnly() {
    return $this->cards[0];
  }
  public function getCards() : array
  {
      return $this->cards;
  }

 }
