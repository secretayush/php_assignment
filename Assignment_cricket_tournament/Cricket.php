<?php
  /**
   * Cricket class
   * A. Highest scorer player.
   * B. Tournament winner team.
   * C. Maximum score in a match.
   */
  class Cricket
  {
    public $raw_data;
    public $max_socre;
    function __construct($raw_data)
    {
      $this->raw_data = $raw_data;
    }
    public function max_score_player()
    {
      foreach ($this->raw_data as $key => $value) {
        foreach ($value as $key1 => $value1) {
          $temp[$key] = max($value1);
        }
      }
      return max($temp);
    }
    public function tournament_winner()
    {
      foreach ($this->raw_data as $key => $value) {
        $count = array();
        foreach ($value as $key1 => $value1) {
          $count[$key1] = array_sum($value1);
        }
        //count stores total run by one team
        $temp[$key] = array_keys($count,(max($count)))[0];
        //temp store key of winner and key as match
      }
      $winner = array_count_values($temp);
      return array_keys($winner,(max($winner)));
    }
    public function max_score_match()
    {
      foreach ($this->raw_data as $key => $value) {
        foreach ($value as $key1 => $value1) {
          $temp[$key] = max($value1);
        }
      }
      return $temp;
    }

  }
?>
