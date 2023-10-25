<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'sar.soporte28@gmail.com'; //SMTP username
    $mail->Password = 'qamowfdymsokzjtr'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    // Emisor
    $mail->setFrom('sar.soporte28@gmail.com', 'Soporte SAR');
    // Receptor
    $mail->addAddress('hectorcaro722@gmail.com'); //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8'; //Set email format to HTML
    $mail->Subject = 'Prueba de PHPMailer';
    $mail->Body = '
            Mamá estoy triunfando, ya estoy enviado correos :D.
            <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.educaciontrespuntocero.com%2Frecursos%2Fprogramacion%2Fprogramacion-en-funcion-del-nivel-educativo%2F&psig=AOvVaw0VUpZNrOc54V3TVaYz1hMm&ust=1693326265012000&source=images&cd=vfe&opi=89978449&ved=0CBAQjRxqFwoTCODH94Xi_4ADFQAAAAAdAAAAABAE"
             style="max-width:100%">
        
        ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '
            <script>
                alert(Mensaje Enviado);
            </script>
        ';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>