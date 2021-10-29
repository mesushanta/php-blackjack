<?php

declare(strict_types=1);

class Dealer extends Player
{

  private $allCards = false;

  public function stand($deck) {
    $this->allCards = true;
    $score = parent::getScore();
    if($score < 15) {
      do {
        parent::hit($deck);
        $score = parent::getScore();
      }
      while ($score < 15);
    }
  }

  public function showAllCards() {
    return $this->allCards;
  }


}
