<?php

$dbhost = "localhost:3308";
$dbname = "uniatleticas";
$dbuser = "root";
$dbpass = "";

//Conectar ao Banco

$con = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($con,$dbname);
        $usuario = $_POST['usuario'];        
        $senha = $_POST['senha'];
        $novasenha = $_POST['novasenha'];
        $confirmarnovasenha = $_POST['confirmarnovasenha'];
        $result = mysqli_query("SELECT senha FROM users WHERE login='$usuario'");
        if(!$result)
        {
        echo "Este usuário não existe!";
        }
        else if($senha!= mysqli_result($result, 0))
        {
        echo "Você digitou uma senha incorreta!";
        }
        if($novasenha=$confirmarnovasenha)
        $sql=mysqli_query("UPDATE users SET senha='$novasenha' where login='$usuario'");
        if($sql)
        {
        echo "Senha alterada com sucesso.";
        }
       else
        {
       echo "A nova senha e a sua confirmação devem ser iguais.";
       }
      ?>