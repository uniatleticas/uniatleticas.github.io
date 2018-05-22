 //Inicializando fun��es do Materialize com jQuery

 $(document).ready(function(){
    $('select').formSelect();
  });
 
 $(document).ready(function(){
    $('.sidenav').sidenav();
  });
function confere_cadastro(){
	var senha = document.getElementById("senha").value;
	var confirmasenha = document.getElementById("confirmasenha").value;

	if(senha != confirmasenha){
		window.alert("Senhas n�o Conferem. Por favor,tente novamente.");
	}
}