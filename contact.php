<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/src/Exception.php'; 
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $mail = new PHPMailer(true);

    $mail ->isSMTP(); 
    $mail ->Host = 'smtp.gmail.com';
    $mail ->SMTPAuth = true ;
    $mail ->Username = 'sleimana181@gmail.com' ;
    $mail ->Password = 'dxlhitnampypnohd';
    $SMTPSecure = 'tls';
    $mail ->Port = 587;

    $mail->setFrom('sleimana181@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail ->isHTML(true);

    $mail ->Subject = $_POST["subject"];

    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $mailBody = "You have received a new message from your website:\n\n";
    $mailBody .= "Full Name: " . $fullName . "\n";
    $mailBody .= "Email: " . $email . "\n";
    $mailBody .= "Phone Number: " . $phone . "\n";
    $mailBody .= "Subject: " . $subject . "\n";
    $mailBody .= "Message: " . $message . "\n";

    $mail ->Body = $mailBody;

    

    if ($mail ->send()) {
        
        echo '<script>alert("Thank you for your message! We will get back to you shortly.");</script>';
    } else {
        echo '<script>alert("There was an error sending your message. Please try again later.");</script>';
    }
}
?>