<?php
  /**
   * Class to sumbit data in database ipl
   */
  class Data
  {
    // declared values in class varables
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
      //connecting database to php code defining constants
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'ayush');
      define('DB_PASSWORD', 'Ayush@123');
      define('DB_NAME', 'ipl');
      //connecting data base to php
      $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      //condition to check if php is connected with database or not
      if (mysqli_connect_errno()) {
        echo "error in connection to database!!!";
      }
    }
    // destructor used to disconnect the connection from database
    function __destruct(){
      // close connect to database
      $this->conn->close();
    }
    //function to add team to team table
    public function add_team($t_name,$c_name)
    {
      //query to insert team name and captain name in team table
      $team1 = "insert into teams(t_name,t_captain) values('$t_name','$c_name')";
      //condition if team is added sucessfully
      if ($this->conn->query($team1)) {
        echo "Added Team";
      }
      //condition if somthing is wrong
      else{
        echo "something worng";
      }
    }
    //function to add venue in venues table in database
    public function add_venue($v_name)
    {
      //query to insert venue in venues table
      $venue = "insert into venues(v_name) values('$v_name')";
      //condition if query didnot run properly
      if ($this->conn->query($venue)) {
        echo "Added venue";
      }
      else{
        echo "something worng";
      }
    }
    //function to store data in match table
    public function store_data()
    {
      //Stored values in class varables
      $this->venue = $_POST['venue'];
      $this->dom = $_POST['date_match'];
      $this->team1 = $_POST['team1'];
      $this->team2 = $_POST['team2'];
      $this->captain1 = $_POST['captain1'];
      $this->captain2 = $_POST['captain2'];
      $this->toss = $_POST['toss'];
      $this->match_win = $_POST['match_win'];
      //query to take venues id from venue table where venue is matched with selected venue.
      $query_venue = "select v_id from venues where v_name = '$this->venue'";
      //sending the query in mysql server and storing result
      $result_venue = $this->conn->query($query_venue);
      //taking the data from the above query in associative array
      $row = mysqli_fetch_assoc($result_venue);
      //id value is stored in varable to insert the value in match table
      $v_id = $row['v_id'];
      //query to take team id from teams table where them name is matched with selected team name.
      $query_team = "select t_id from teams where t_name = '$this->team1'";
      $result_team = $this->conn->query($query_team);
      //taking the data from the above query in associative array
      $row1 = mysqli_fetch_assoc($result_team);
      //id value is stored in varable to insert the value in match table
      $t_id1 = $row1['t_id'];
      //query to take team id from teams table where them name is matched with selected team name.
      $query_team = "select t_id from teams where t_name = '$this->team2'";
      $result_team = $this->conn->query($query_team);
      //taking the data from the above query in associative array
      $row = mysqli_fetch_assoc($result_team);
      //id value is stored in varable to insert the value in match table
      $t_id2 = $row['t_id'];
      //query to insert data in match table
      $match = "insert into matchs(match_date,v_id,result,team_1,team_2,toss) values('$this->dom','$v_id','$this->match_win','$t_id1','$t_id2','$this->toss')";
      //condition to check is data is inserted properly or not
      if ($this->conn->query($match)) {
        echo "Added data in match table!!";
      }
      else{
        echo "Something is wrong!!";
      }
    }
  }
 ?>
