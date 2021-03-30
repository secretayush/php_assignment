<?php
  //class contains cond to check user won or loss
  class Game{
    public $comp;
    public $game;
    function __construct(){
      $this->comp = "";
      $this->game = array('Rock','Paper','Scissor');
    }
    public function game_rules($input)
    {
      //Computer selects randomly from rock paper or scissor
      $this->comp = $this->game[rand(0,2)];
      //To check if input is set or not
      $flag = 0;
      if (isset($input)) {
        //draw cond check
        if ($this->comp == $input) {
          $flag = 1;
        }
        elseif ($this->comp == 'Rock' && $input == 'Scissor') {
          $flag = 2;
        }
        elseif ($this->comp == 'Scissor' && $input == 'Paper') {
          $flag = 3;
        }
        elseif ($this->comp == 'Paper' && $input == 'Rock') {
          $flag = 4;
        }
        //when above cond fails user win
        else{
          $flag = 5;
        }
      }
      // if not input is not set
      else{
        $flag = 0;
      }
      $this->show_result($this->comp,$input,$flag);
      return $flag;
    }
    public function show_result($comp,$input,$flag){
      if ($flag != 0) {
        echo "<br>Computer : ".$comp."<br>User : ".$input;
      }
    }
  }

?>
