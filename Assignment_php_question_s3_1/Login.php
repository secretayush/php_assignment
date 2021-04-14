<?php
/**
  * Login SignUp using git or google oauth
  */
 require_once 'vendor/autoload.php';
 class Login
 {
  public $conn;
  public $email;
  public $name;
  /**
   * Construction to connect database to php code
   * initilize the connection varable of class.
  */
  function __construct()
  {
    //connecting database to php code
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'ayush');
    define('DB_PASSWORD', 'Ayush@123');
    define('DB_NAME', 'login');
    // establishing connection to mysql server
    $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
    // condition to check if connection is properly established or nor
    if (mysqli_connect_errno()) {
      echo "Error in connection to database!!!";
    }
  }
  /**
   *  Close connect to database.
   */
  function __destruct(){
    $this->conn->close();
  }
  /**
   * Login user using google oauth functionality
   */
  public function google_login()
  {
    // init configuration
    $clientID = 'xxx';
    $clientSecret = 'xxxx';
    $redirectUri = 'xx';

    // create Client Request to access Google API
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");

    // authenticate code from Google OAuth Flow
    if (isset($_GET['code'])) {
      $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
      $client->setAccessToken($token['access_token']);

      // get profile info
      $google_oauth = new Google_Service_Oauth2($client);
      $google_account_info = $google_oauth->userinfo->get();
      $this->email =  $google_account_info->email;
      $this->name =  $google_account_info->name;
      // call redirect function to send/ check if data present in data base or not.
      $this->redirect();
      // now you can use this profile info to create account in your website and make user logged in.
    } else {
      header('location:'.$client->createAuthUrl());
    }
  }
  /**
   * Configure the
   */
  public function github_login()
  {
    // init configuration for github
    $clientID = 'xxxx';
    $clientSecret = 'xxxx';
    $redirectUri = 'xxxx';

    $client = new \League\OAuth2\Client\Provider\Github([
    'clientId'          => $clientID,
    'clientSecret'      => $clientSecret,
    'redirectUri'       => $redirectUri,
    ]);
    if (!isset($_GET['code'])) {
      // If we don't have an authorization code then get one
      $options = ['scope' => ['user', 'user:email']];
      $authUrl = $client->getAuthorizationUrl($options);;
      // $_SESSION['oauth2state'] = $client->getState();
      header('Location: '.$authUrl);
      exit;
    }
    else {
      // Try to get an access token (using the authorization code grant)
      $token = $client->getAccessToken('authorization_code', [
          'code' => $_GET['code']
      ]);
      $user = $client->getResourceOwner($token);
      $user = $user->toArray();
      $this->email = $user['login'];
      $this->name = $user['name'];
      // call redirect function to send/ check if data present in data base or not.
      $this->redirect();
    }
  }
  /**
   * Redirect fun to check if user is new or old and insert into table
   */
  public function redirect()
  {
    $sql = 'select * from user where email ="'.$this->email.'"';
    $data = $this->conn->query($sql);
    if (mysqli_num_rows($data) == 0) {
      $sql = 'insert into user values("'.$this->email.'","'.$this->name.'")';
      $data = $this->conn->query($sql);
      $result = "<div align='center'>Thank you ".$this->name."</div>";
    }
    else{
      $result = "<div align='center'>Welcome back ".$this->name."</div>";
    }
    echo $result;
  }
 }
 ?>
