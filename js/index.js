 $(document).ready(function(){
    $('select').formSelect();
  });
 
function confere_cadastro(){
	var senha = document.getElementById("senha").value;
	var confirmasenha = document.getElementById("confirmasenha").value;

	if(senha != confirmasenha){
		window.alert("Senhas n�o Conferem. Por favor,tente novamente.");
	}
}