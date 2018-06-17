<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $msg = "Nome: $nome\n\nE-mail: $email\n\nMensagem: $mensagem\n";
    $mail->setLanguage('pt_br', 'PHPMailer/languages/phpmailer.lang.pt_br.php');
    $mail->CharSet="UTF-8";
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'contatouniatleticas@gmail.com';                 // SMTP username
    $mail->Password = 'uni2018atleticas';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                       // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('uniatleticas@gmail.com', 'UNIAtléticas');
    $mail->addAddress('gianveloxsi@gmail.com', 'Velox');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contato UniAtléticas';
    $mail->Body ="$msg";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}