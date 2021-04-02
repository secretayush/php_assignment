<?php
  /**
   *Product order
   */
  require_once "vendor/autoload.php";
  use GuzzleHttp\Client;

  class Gists
  {
    public $api_url;
    public $code;
    public $access_token;
    function __construct($api,$code,$access_token)
    {
      $this->api_url = $api;
      $this->code = $code;
      $this->access_token = $access_token;
    }
    public function gists_write()
    {
      ini_set('user_agent', "PHP");
      //contains data
      $data = json_encode(array(
          'description' => 'Assignment gists',
          'public' => 'true',
          'files' => array(
              time().'.txt' => array(
                  'content' => $this->code
              )
          )
      ));
      // post the gisit to gists page
      $options = ["http" => [
          "method" => "POST",
          "header" => ["Authorization: token " . $this->access_token,
              "Content-Type: application/json"],
          "content" => $data
          ]];
      $context = stream_context_create($options);
      $response = file_get_contents($this->api_url, false, $context);
      echo "Created gists !!!";
    }
    //using guzzle
    public function gists_using_guzzle()
    {
        ini_set('user_agent', "PHP");

        $data = json_encode(array(
          'description' => 'Assignment gists guzzle',
          'public' => 'true',
          'files' => array(
              time().'guzzle.txt' => array(
                  'content' => $this->code
              )
          )
        ));
      $options = ['headers'=>array(
                      'Authorization' => 'token '.$this->access_token),
                      'body' => $data ];

      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST', $this->api_url, $options);
      echo "Created gists !!!";
    }
  }
?>
