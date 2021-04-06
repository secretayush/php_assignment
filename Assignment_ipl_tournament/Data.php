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
    function __construct()
    {
      $this->venue = $_POST['venue'];
      $this->dom = $_POST['date_match'];
      $this->team1 = $_POST['team1'];
      $this->team2 = $_POST['team2'];
      $this->captain1 = $_POST['captain1'];
      $this->captain2 = $_POST['captain2'];
      $this->toss = $_POST['toss'];
      $this->match_win = $_POST['match_win'];
    }
    public function store_data()
    {
      //connecting database to php code
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'ayush');
      define('DB_PASSWORD', 'Ayush@123');
      define('DB_NAME', 'ipl');
      $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      if (mysqli_connect_errno()) {
        // die('error');
        echo "error";
      }
      else{
        //venues
        $venue = "insert into venues(v_name) values('$this->venue')";
        //check if venue is already avalible or not
        if (!$conn->query($venue)) {
          echo "Venue is already avalible ";
        }
        $v_id = $conn->insert_id;

        //insert team 1 in teams table
        $team1 = "insert into teams(t_name,t_captain) values('$this->team1','$this->captain1')";
        if (!$conn->query($team1)) {
          echo "Team 1 is already avalible ";
        }
        $t_id1 = $conn->insert_id;

        //insert team2 data in teams table
        $team2 = "insert into teams(t_name,t_captain) values('$this->team2','$this->captain2')";
        if (!$conn->query($team2)) {
          echo "Team 2 is already avalible ";
        }
        $t_id2 = $conn->insert_id;

        //insert match data in match table
        $match = "insert into matchs(match_date,v_id,result,team_1,team_2,toss) values('$this->dom','$v_id','$this->match_win','$t_id1','$t_id2','$this->toss')";
        if (!$conn->query($match)) {
          echo "match is avalible";
        }
        echo "sucessfull";
        // close connect to database
        $conn->close();
      }
    }
  }

 ?>
