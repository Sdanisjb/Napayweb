<?php
    // Pear Mail Library
    require_once "PHPMailer/PHPMailer.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;

    $name = htmlspecialchars($_POST["pirate-forms-contact-name"]);
    $email = htmlspecialchars($_POST["pirate-forms-contact-email"]);
    $subject = htmlspecialchars($_POST["pirate-forms-contact-subject"]);
    $input_message = htmlspecialchars($_POST["pirate-forms-contact-message"]);

    $from = '<napay.travel@gmail.com>';
    $to = '<'.$email.'>';
    $subject = 'Contact Form from our Webpage';

    $body = "/n Nombre: ".$name."/n";
    $body .= "/n Email: ".$email."/n";
    $body .= "/n Subject: ".$subject."/n";
    $body .= "/n Message: ".$input_message."/n";

    $body = wordwrap($body, 70);    

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "napay.travel@gmail.com";
    $mail->Password = "Aqp906ejA";

    $mail->setFrom('napay.travel@gmail.com', 'Napay Travel');
    $mail->addAddress($email, $name);
    $mail->Subject = $subject;
    $mail->AltBody = $body;
    

    header('Location: index.html');
    if (!$mail->send()) {
        header('Location: index.html');
    } else {
        header('Location: index.html');
    }

?>