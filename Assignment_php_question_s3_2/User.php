<?php
/**
  * User information class is showing user informaation and hhtp header
  */
 class User{
  public $browser,$header,$osinfo,$username;
  /**
   * This is used to initilize the information of system
   */
  public function getinfo()
  {
    //http header
    if (isset($_SERVER['HTTPS'])) {
      $this->header = 'HTTPS';
    }
    else
    {
      $this->header = 'HTTP';
    }
    //os information
    $this->username =  php_uname();
    $this->osinfo =  PHP_OS;
    // browser information
    $this->browser =$_SERVER['HTTP_USER_AGENT'];
  }
 }
 ?>
