<?php
  /**
   *Product order
   */
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
  }
?>
