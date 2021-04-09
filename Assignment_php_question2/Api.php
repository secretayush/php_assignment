<?php
/**
  * Giphy api request assignment
  * varables:
  * url takes api url link
  * methods:
  * get api
  * get roandom gif
  */
 class Api
 {
  // Declare url variable of class
   public $url;
   /**
    * Construstor contains url and initilizing the url varbale of class.
   */
   function __construct($url)
   {
      $this->url = $url;
   }
   /*
    *Return the data from api using the below function.
   */
   public function get_api($api_url){
    $result = file_get_contents($api_url);
    $response = json_decode($result, true);
    return $response;
    }
  /**
   * function to fetch the random gif by calling the api and returning url link
  */
  public function get_random_gif()
   {
    $data = $this->get_api($this->url);
    // returning the gif url to index.php file
    return $data['data']['images']['original']['url'];
   }
 }
 ?>
