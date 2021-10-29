<?php

declare(strict_types=1);

class Dealer extends Player
{

  private $allCards = false;
  private $completed = false;

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
    $this->completed = true;
  }

  public function showAllCards() {
    return $this->allCards;
  }

  public function gameCompleted() {
    return $this->completed;
  }


}
