<?php
  /**
   * Sending mail to user
   */
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/autoload.php';
  class Mail
  {
    public function check_mail($email){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $email = $_POST['email'];
        //if mail is empty then reload the index page
        if (empty($email)) {
            echo "<div class='incorrect'>Please enter your mail !</div>";
            include('index2.php');
        }
        else{
          //Initialize CURL:
          $ch = curl_init('http://apilayer.net/api/check?access_key=d7625716eae944521d8f58f489a28000&email='.$email);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // Store the data:
          $json = curl_exec($ch);
          curl_close($ch);
          // Decode JSON response:
          $validationResult = json_decode($json, true);
          // Initialize CURL:
          $ch = curl_init('http://apilayer.net/api/check?access_key=d7625716eae944521d8f58f489a28000&email='.$email);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // Store the data:
          $json = curl_exec($ch);
          curl_close($ch);
          // Decode JSON response:
          $validationResult = json_decode($json, true);
          if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email) || ($validationResult['score']<0.8)) {
            echo "<div class='incorrect'>Invalid mail id please enter again</div>";
            include('index2.php');
          }
          else{
            require 'PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->SMTPDebug = 0;
            $mail->isSMTP();

            $mail->Host = 'tls://smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->Username = 'ayush.dev@innoraft.com';
            $mail->Password = 'showofff';   // TCP port to connect to

            $mail->setFrom('ayush.dev@innoraft.com');
            $mail->addAddress($email);               // email of reciver
            $mail->addReplyTo('ayush.dev@innoraft.com');

            $mail->isHTML(true);
            $mail->Subject = 'Welcome to innoraft';
            $mail->Body    = 'Welcome to innoraft <b>'.$email.'</b>';

            // cond to check if mail is sent
            if(!$mail->send()) {
                echo "<div class='incorrect'>Message could not be sent.</div>";
                echo "<div class='incorrect'>Mailer Error: " . $mail->ErrorInfo."</div>";
                include('index2.php');
            }
            else {
                echo "<div class='incorrect'>Message has been sent!!!</div>";
                include('index2.php');
            }
          }
        }
      }
    }
  }
  $request = new Mail();
  $mail = $_POST['email'];
  $request->check_mail($mail);
?>
