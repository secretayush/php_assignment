<?php
  /**
   * Data to fetch using api
   */
  class Data{
    public $api_url;
    public $user_data;
    public $ch;
    public $info,$show,$img,$imgarr,$icons,$iconlink,$check,$op,$k,$response_data;
    // to get data from api and store in user_data
    public function get_api($api_url){
      $this->api_url = $api_url;
      $ch = curl_init();
      // Set the URL
      curl_setopt($ch, CURLOPT_URL, $this->api_url);
      // Removes the headers from the output
      curl_setopt($ch, CURLOPT_HEADER, 0);
      // Return the output instead of displaying it directly
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      // Execute the curl session
      $op = curl_exec($ch);
      // Close the curl session
      curl_close($ch);
      // Decode JSON data into PHP array
      $response_data = json_decode($op);
      // All user data exists in 'data' object
      $user_data = $response_data->data;

      return $user_data;
    }
    //to get the images
    public function get_image($user_data){
      $img = $user_data->relationships->field_image->links->related->href;
      // calling get_api to return data from the api
      $imgarr = $this->get_api($img);
      $imgarr = $imgarr->attributes->uri->url;
      //appending innoraft.com before the adderss
      $imgarr = "http://innoraft.com".$imgarr;
      return '<img src="'.$imgarr.'">';
    }
    //to get icon images
    public function get_icon_image($user_data){
      $img = $user_data->relationships->field_media_image->links->related->href;
      // calling get_api to return data from the api
      $imgarr = $this->get_api($img);
      $imgarr = $imgarr->attributes->uri->url;
      //appending innoraft.com before the adderss
      $imgarr = "http://innoraft.com".$imgarr;
      return '<img src="'.$imgarr.'" height= "50px" width="50px">';
    }
    // to get icons form api
    public function get_icon($user_data){
      $iconlink = $user_data->relationships->field_service_icon->links->related->href;
      $icons = $this->get_api($iconlink);
      //list to store icons in html
      $show .= "<br><div class='list_icon'><ul>";
      //run though icons and fetch images
      foreach ($icons as $key => $value) {
        $show .= "<li>".$this->get_icon_image($value)."</li>";
      }
      $show .= "
      </ul>
      </div>";
      return $show;
    }
    //Arranging the data in below function
    public function get_data($data){
      $user_data = $data;
      //To take only these title form the api
      $check = array('Drupal Website Development','Mobile App Development','eCommerce Website Development','Website Design & Development');
      //to fetch even content and odd content
      $k = 0;
      // running loop through to fetch data from api
      $this->info .= "<div class='container'><div class='content'>";
      // loop to get data from the api
      foreach ($user_data as $key => $value) {
        if (in_array($value->attributes->title, $check)) {
          // if k is even show image first
          if ($k%2 == 0) {
            $this->info .= "<div class='main_image'>";
            $this->info .= "<div class='left'>".$this->get_image($value)."</div>";
            $this->info .= "</div>";
            $this->info .= "<div class='sec_content'>";
            $this->info .= "<div class='left'><h1>".$value->attributes->field_secondary_title->value."</h1></div>";
            $this->info .= "<div class='left'>".$this->get_icon($value)."</div>";
            //to replace the href= to href=https://www.innoraft.com
            $temp = str_replace('href="', 'href="https://www.innoraft.com', $value->attributes->field_services->processed);
            $this->info .= "<div class='left'>".$temp."</div>";
            $this->info .= "<div class='button'><a href='http://innoraft.com".$value->attributes->path->alias."'>Explore More</a></div>";
            $this->info .= "</div>";
          }
          // show contet first
          else{
            $this->info .= "<div class='sec_content'>";
            $this->info .= "<div class='left'><h1>".$value->attributes->field_secondary_title->value."</h1></div>";
            $this->info .= "<div class='left'>".$this->get_icon($value)."</div>";
            //to replace the href= to href=https://www.innoraft.com
            $temp = str_replace('href="', 'href="https://www.innoraft.com', $value->attributes->field_services->processed);
            $this->info .= "<div class='left'>".$temp."</div>";
            $this->info .= "<div class='button'><a href='http://innoraft.com".$value->attributes->path->alias."'>Explore More</a></div>";
            $this->info .= "</div>";
            $this->info .= "<div class='main_image'>";
            $this->info .= "<div class='left'>".$this->get_image($value)."</div>";
            $this->info .= "</div>";
          }
        $k++;
        }
      }
      $this->info .= "</div>
      </div>";
      echo $this->info;
    }
  }
?>
