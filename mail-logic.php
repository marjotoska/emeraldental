<?php

// send email with composer 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['submit'])) {
	$firstname = $_POST['first-name'];
	$lastname = $_POST['last-name'];
	$phonenumber = $_POST['phone-number'];
	$patientemail = $_POST['patient-email'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'mariotoska13@gmail.com';
      // Gmail Password
      $mail->Password = 'boothbaynightmare';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom('mariotoska13@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress($email);

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission from Emerald Dental Clinic';
	  $mail->Body = "<h3>First Name : $firstname <br>
					  Last Name : $lastname <br>
					  Phone Number : $phonenumber <br>
					  Phone Number : $phonenumber <br>
					  Patient Email : $patientemail <br>
					  Date : $date <br>
					  Time : $time <br>
					  Message : $message <br></h3>";

      $mail->send();
	  $output = '<div class="alert alert-success" style="background: -webkit-linear-gradient(right, #21d4fd, #b721ff);
      background-image: -webkit-linear-gradient(
        right,
        rgb(33, 212, 253),
        rgb(183, 33, 255)
      );
  border-radius: 6px;
  padding: 7px 7px 7px 5px;
  margin-bottom: 5px;
  color: white;
  ">
            <h4>Check your email address for the password reset link.</h4>
        </div>';
    } catch (Exception $e) {
        $output = '<div class="alert alert-success" style="background: -webkit-linear-gradient(right, #21d4fd, #b721ff);
        background-image: -webkit-linear-gradient(
            right,
            rgb(33, 212, 253),
            rgb(183, 33, 255)
        );
    border-radius: 6px;
    padding: 7px 7px 7px 5px;
    margin-bottom: 5px;
    color: white;
    ">
                    <h5>' . $e->getMessage() . '</h5>
                    </div>';
        }
    }
?>
