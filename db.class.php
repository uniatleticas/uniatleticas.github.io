<?php

class db{
	//host
	private $host = "localhost:3306";

	//usuario
	private $usuario = 'root';

	//senha
	private $senha = '';

	//banco de dados
	private $database = 'uniatleticas';

	public function conecta_mysql(){
		//criar a conexao
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		//ajusrar o charset de comunicacao entre a aplicacao e o banco de dados
		mysqli_set_charset($con, 'utf8');

		//verificar se houve erro de conexao
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_error();
		}

		return $con;
	}
}

?>