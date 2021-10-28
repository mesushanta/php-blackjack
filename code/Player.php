<?php

/**
 * 
 */
class Player
{
    
  private $cards = array();
  private $lost = false;
  private $deck;
  private $max = 21;
  
  function __construct($deck)
  {
    for($i=0; $i<2; $i++) {
      $this->cards = $deck->drawCard();
    }
    
  }
  
  public function  hit($deck) {
    $this->cards = $deck->drawCard();
    $score = $this->getScore();
    if($score > 21) {
      $this->lost = true;
    }
  }
  
  public function  surrender() {
    $this->lost = true;
  }
  
  public function  haslost() {
    return $this->lost;
  }
  
  public function  getScore() {
    $score = 0;
    foreach ($this->cards as $card) {
      $score += $card;
    }
    return $score;
  }
  
 }