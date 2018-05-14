<?php

session_start();

unset($_SESSION['usuario']);
unset($_SESSION['email']);

echo 'Até mais!!!';
header("Refresh:5; url=index.php");

?>