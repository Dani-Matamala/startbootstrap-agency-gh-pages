<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];

try{
$mail = new PHPMailer;

$mail->SMTPDebug = 2;
$mail->Host = '';
$mail->Port = '';
$mail->SMTPAuth = true;
$mail->Username = '';
$mail->Password = '';
$mail->SMTPSecure = '';

$mail->setFrom($email, $name);
$mail->addReplyTo($email, $name);
$mail->addAddress($email, 'Contacto');
$mail->Subject = 'Consulta via web';
$mail->Body = 'Acabas de recibir un mensaje de contacto a traves de la web de Academia Manejar. 

Nombre: ' . $name . '

Telefono: '. $phone .'

Mensaje: 
"' . $message . '"';


if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("Location: mail_enviado.html");
    exit;
}
}catch(Exception $e){
  echo "Problem: " . $e;  
}
?>
