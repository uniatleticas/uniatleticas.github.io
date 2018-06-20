<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $msg = "<b>Um novo bug foi reportado!</b>\n\n";
    $msg. = "<b>Detalhes Enviados:</b>\n\n";
    $msg. = "<b>Nome:</b> $nome\n\n<b>E-mail:</b> $email\n\n<b>Mensagem:</b> $mensagem\n";
    $mail->setLanguage('pt_br', '../PHPMailer/languages/phpmailer.lang.pt_br.php');
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
    header("Refresh:5; url=../configuracoes.php");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>

<html>
<head>
<title>Formulário Enviado</title>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/logincadastro.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Importando Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
<style>
	body{	
	background: url('../img/perfil.png');
	overflow: scroll;
	}
</style>
<div class="valign-wrapper row login-box">
  <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
  <form id="formCadastro">
      <div class="card-content">
      	<img id="logo" src="../img/logo.png">
        <span class="card-title" style="display:block;">Formulário enviado com sucesso!</span>
        <div class="row">          
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>