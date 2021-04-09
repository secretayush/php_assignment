<?php
  /**
   * Sending mail to user
   * adding php mailer files to send email to user and owner
   */
  // including php mailer files
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require 'vendor/autoload.php';
  class Mail
  {
    // varables declared
    public $mail;
    public $mail_user;
    function __construct(){
      //including the php mailer autoload file
      require 'php_mailer/PHPMailerAutoload.php';
      //creating new object of phpmailer class mail for owner and 2nd for user
      $this->mail = new PHPMailer;
      $this->mail_user = new PHPMailer;
    }
    // function used to set up the php mailer to initilize the mailer  http port to send mail
    public function set_up($mailer)
    {
      //set debug is true to show error in code
      $mailer->SMTPDebug = 0;
      $mailer->isSMTP();
      //initilizing host provider to send email
      $mailer->Host = 'tls://smtp.gmail.com';
      $mailer->SMTPAuth = true;
      $mailer->Port = 587;
      $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      //initilizing id and password of gmail account
      $mailer->Username = 'ayush.dev@innoraft.com'; // owners mail id
      $mailer->Password = 'showofff';   // password
    }
    //main fun which take paramenter from index page and process them to send maill to user and owner
    public function send_mail($name,$email,$message){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //if mail is empty then reload the index page
        if (empty($email)) {
          $var = "<div class='incorrect'>Please enter your mail !</div>";
        }
        else{
          // Initialize CURL to check email is correct or not using api:
          $ch = curl_init('http://apilayer.net/api/check?access_key=d7625716eae944521d8f58f489a28000&email='.$email);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // Store the data:
          $json = curl_exec($ch);
          curl_close($ch);
          // Decode JSON response:
          $validationResult = json_decode($json, true);
          // condition to check if mail id exists or not
          if ($validationResult['score']<0.8) {
            $var = "<div class='incorrect'>Invalid mail id please enter again</div>";
          }
          else{
            //calling function to set up the php mailer
            $this->set_up($this->mail);
            $this->mail->setFrom($email);
            $this->mail->addAddress('ayush.dev@innoraft.com');
            // email of reciver
            $this->mail->addReplyTo($email);
            //mail content are intilized using ishtml function
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Message from '.$name;
            $this->mail->Body    = 'Message : '.$message.'';
            // cond to check if mail is sent
            if(!$this->mail->send()) {
                $var = "<div class='incorrect'>Message could not be sent.</div>";
            }
            else {
              //calling then send user fun to send responce to user that mail is sent to owner plus addded cond to check return value
              if(!$this->send_user($email)) {
                $var = "<div class='incorrect'>Message could not be sent.</div>";
              }
              else {
                $var = "<div class='incorrect'>Message has been sent to both user and owner!!!</div>";
              }
            }
          }
        }
      }
      return $var;
    }
    public function send_user($mail)
    {
      $this->set_up($this->mail_user);
      //from where mail is sending to the user
      //send response message if mail is sent to owner
      $this->mail_user->setFrom('ayush.dev@innoraft.com');
      $this->mail_user->addAddress($mail);               // email of reciver
      $this->mail_user->addReplyTo('ayush.dev@innoraft.com');
      //mail content are intilized using ishtml function
      $this->mail_user->isHTML(true);
      $this->mail_user->Subject = 'Message Sent to owner';
      $this->mail_user->Body    = 'Thank you we will contact you soon!!';
      // cond to check if mail is sent
      if(!$this->mail_user->send()) {
        return 0;
      }
      else {
        return 1;
      }
    }
  }
?>
