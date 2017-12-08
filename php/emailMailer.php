<?php
// include_once ('./mailData.php');


$clientName = $name;
$clientEmail = $email;
$clientTitle = "";
$clientQuestion = $message;

$clientEmail = trim($clientEmail); // pasalina tarpus pries ir uz (paduoto String)


require '../libs/PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tautvydascoding@gmail.come';           // SMTP username
    $mail->Password = 'slaptazodis';                      // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('prezidentas@gmail.com', 'Klientas');
    $mail->addAddress('testasCoding@gmail.com', 'Musu brand: puslapiu kurejai');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo( $clientEmail, $clientName);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $clientTitle;
    $mail->Body    = "<b>$clientQuestion</b>";
    $mail->AltBody = $clientQuestion;

    $mail->send();  // issiuncia email


    echo '<br><br />Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}




//
