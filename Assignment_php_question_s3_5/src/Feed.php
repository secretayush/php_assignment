<?php
 namespace Src;
 require "vendor/autoload.php";
 use Abraham\TwitterOAuth\TwitterOAuth;
/**
  * Get feed of the user using twitter api
  * Add api key from twitter app
  */
 class Feed{
  private $access_token,$access_token_secret,$api_key,$api_key_sec;
  public $connection;
  /**
   * Initilizing the twitter api secret keys and making connection
   */
  function __construct()
  {
    $access_token = "xxx";
    $access_token_secret = "xxx";
    $api_key="xxx";
    $api_key_sec = "xxx";
    //Making connection from twitter api using the auth key and access tokens
    $this->connection = new TwitterOAuth($api_key, $api_key_sec, $access_token, $access_token_secret);
  }
  /**
   * Function is used to show the feeds for the user
   */
  public function show_feed()
  {
    //Accessing the users tweets in user timeline
    $content = $this->connection->get("statuses/user_timeline",["trim_user" => true, "exclude_replies" =>true,]);
    //Decoding from json format to array
    $data = json_decode(json_encode($content),true);
    echo "<ul>";
    foreach ($data as $key => $value) {
      echo "<li>".$value['text']."</li><br>";
    }
    echo "</ul>";
  }
 }
?>
