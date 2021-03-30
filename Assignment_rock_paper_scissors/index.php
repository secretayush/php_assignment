<?php
  //class contains cond to check user won or loss
  class Game{
    public $comp;
    public $game;
    function __construct(){
      $this->comp = "";
      $this->game = array('Rock','Paper','Scissor');
    }
    public function condition($input)
    {
      //Computer selects randomly from rock paper or scissor
      $this->comp = $this->game[rand(0,2)];
      //To check if input is set or not
      if (isset($input)) {
        //draw cond check
        if ($this->comp == $input) {
          echo "<br>Draw Play again<br>";
          echo "Computer : ".$this->comp."<br>User : ".$input;
        }
        elseif ($this->comp == 'Rock' && $input == 'Scissor') {
          echo "<br>You Loss!!!<br>";
          echo "Computer : ".$this->comp."<br>User : ".$input;
        }
        elseif ($this->comp == 'Scissor' && $input == 'Paper') {
          echo "<br>You Loss!!!<br>";
          echo "Computer : ".$this->comp."<br>User : ".$input;
        }
        elseif ($this->comp == 'Paper' && $input == 'Rock') {
          echo "<br>You Loss!!!<br>";
          echo "Computer : ".$this->comp."<br>User : ".$input;
        }
        //when above cond fails user win
        else{
          echo "<br>You Winn!!!<br>";
          echo "Computer : ".$this->comp."<br>User : ".$input;
        }
      }
      // if not input is not set
      else{
        echo "<br>Please select any one!";
      }
    }
  }

?>
