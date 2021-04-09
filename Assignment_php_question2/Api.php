<?php
/**
  * Giphy api request assignment
  */
 class Api
 {
  // declar url variable
   public $url;
   //construstor contains url and initilizing the url varbale of class
   function __construct($url)
   {
      $this->url = $url;
   }
   // to get the data from any api
   public function get_api($api_url){
    //using this function to get contents from the api
    $result = file_get_contents($api_url);
    //decoding the response from api to assositive array
    $response = json_decode($result, true);
    // return the response data
    return $response;
    }
  //function to fetch the random gif by calling the api and returning url link
  public function get_random_gif()
   {
    //get data by calling the get_api()
    $data = $this->get_api($this->url);
    // returning the gif url to index.php file
    return $data['data']['images']['original']['url'];
   }
 }
 ?>
