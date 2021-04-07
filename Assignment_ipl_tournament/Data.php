<?php
  /**
   * Class to sumbit data
   */
  class Data
  {
    public $venue;
    public $dom;
    public $team2;
    public $team1;
    public $captain1;
    public $captain2;
    public $toss;
    public $match_win;
    public $conn;
    function __construct()
    {
      //connecting database to php code
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'ayush');
      define('DB_PASSWORD', 'Ayush@123');
      define('DB_NAME', 'ipl');
      $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      if (mysqli_connect_errno()) {
        // connection faild
        echo "error in connection to database!!!";
      }
    }
    // close connect to database
    function __destruct(){
      $this->conn->close();
    }
    public function add_team($t_name,$c_name)
    {
      // $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      if (mysqli_connect_errno()) {
        echo "error in connection to database!!!";
      }
      else{
         $team1 = "insert into teams(t_name,t_captain) values('$t_name','$c_name')";
        if ($this->conn->query($team1)) {
          echo "Added Team";
        }
        else{
          echo "something worng";
        }
      }
    }
    public function add_venue($v_name)
    {
      // $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      if (mysqli_connect_errno()) {
        echo "error in connection to database!!!";
      }
      else{
        $venue = "insert into venues(v_name) values('$v_name')";
        if ($this->conn->query($venue)) {
          echo "Added venue";
        }
        else{
          echo "something worng";
        }
      }
    }
    public function store_data()
    {
      $this->venue = $_POST['venue'];
      $this->dom = $_POST['date_match'];
      $this->team1 = $_POST['team1'];
      $this->team2 = $_POST['team2'];
      $this->captain1 = $_POST['captain1'];
      $this->captain2 = $_POST['captain2'];
      $this->toss = $_POST['toss'];
      $this->match_win = $_POST['match_win'];

      //venues
      $query_venue = "select v_id from venues where v_name = '$this->venue'";
      $result_venue = $this->conn->query($query_venue);
      $row = mysqli_fetch_assoc($result_venue);
      $v_id = $row['v_id'];

      //insert team 1 in teams table
      $query_team = "select t_id from teams where t_name = '$this->team1'";
      $result_team = $this->conn->query($query_team);;
      $row1 = mysqli_fetch_assoc($result_team);
      $t_id1 = $row1['t_id'];

      //insert team2 data in teams table
      $query_team = "select t_id from teams where t_name = '$this->team2'";
      $result_team = $this->conn->query($query_team);;
      $row = mysqli_fetch_assoc($result_team);
      $t_id2 = $row['t_id'];

      //insert match data in match table
      $match = "insert into matchs(match_date,v_id,result,team_1,team_2,toss) values('$this->dom','$v_id','$this->match_win','$t_id1','$t_id2','$this->toss')";
      if ($this->conn->query($match)) {
        echo "Added data in match table!!";
      }
      else{
        echo "Something is wrong!!";
      }
    }
  }

 ?>
