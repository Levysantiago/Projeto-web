
var errorColor = "#f99595";

function validaForm(f){
	let formatTxt = /^[a-zA-Z]{3,100}$/;
	let formatIdade = /^[0-9]{2,3}$/;
	let formatDataNasc = /(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/;
	let formatHora = /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
	let formatTel = /^[0-9]{2}\-[0-9]{5} [0-9]{4}$/;
	let formatSenha = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,10}$/;
	let formatEmail = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

	//Login
	if(!formatEmail.test(f.login.value)){
		requireInput(f.login, "Email inválido");
		return false;
	}

	//Senha
	if(!formatSenha.test(f.password.value)){
		requireInput(f.login, "Senha deve incluir letras, números e caracteres especiais; não menor que 6 caracteres e no máximo 10");
		return false;
	}

	//Nome Completo
	if (f.nome.value == "" || f.nome.value == null || f.nome.value.length < 3){
		requireInput(f.nome, "Informe seu nome.");
		return false;
	}

	if(!formatTxt.test(f.nome.value)){
		requireInput(f.nome, "O campo \"Nome Completo\" precisa ter letras do alfabeto. Tamanho máximo 100 caracteres.");
		return false;
	}

	//Telefone
	if(f.tel.value == "" || f.tel == null){
		requireInput(f.tel, "Informe seu telefone.");
		return false;
	}

	if(!formatTel.test(f.tel.value)){
		requireInput(f.tel, "Telefone precisa seguir o formato: 00-00000 0000.");
		return false;
	}

	//Idade
	if(f.idade.value == "" || f.idade == null){
		requireInput(f.idade, "Informe sua idade.");
		return false;
	}

	if(!formatIdade.test(f.idade.value) || f.idade.value > 200 || f.idade.value < 18){
		requireInput(f.idade, "Idade permitida entre 18 e 200 anos.");
		return false;
	}

	//Cor Preferida
	if(f.color.value == "" || f.color.value == null){
		alert("Selecione uma cor.");
		f.color.scrollIntoView();
		return false;
	}

	//Preferencia de conteúdo
	if(getCheckboxes().length < 1){
		alert("Você precisa selecionar pelo menos um dos conteúdos.");
		document.querySelector('#checkbox-group').scrollIntoView();
		return false;
	}

	//Cartão
	if(f.cartao.selectedIndex == 0){
		alert("Selecione um tipo de cartão.");
		f.cartao.style.backgroundColor = errorColor;
		f.cartao.scrollIntoView();
		return false;
	}

	//Data nascimento
	if(f.nasc.value != "" && f.nasc.value != null && !formatDataNasc.test(f.nasc.value)){
		requireInput(f.nasc, "O formato da data é dd/mm/aaaa, valor inválido.");
		return false;
	}

	//Hora
	if(f.horario.value != "" && f.horario.value != null && !formatHora.test(f.horario.value)){
		requireInput(f.horario, "O formato do horário é hh:mm, valor inválido.");
		return false;
	}

	//Comentarios
	if(f.comentarios.value != "" && f.comentarios.value != null && f.comentarios.value.length > 120){
		requireInput(f.comentarios, "O campo 'Comentários' só pode ter 120 caracteres.");
		return false;
	}
}

function getCheckboxes(){
	let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
	return checkboxes;
}

function requireInput(input, info){
	alert(info);
	input.style.backgroundColor = errorColor;
	input.focus();
}

function resetInputStyle(input){
	input.style.backgroundColor = "white";
}

function resetComboBox(comb){
	comb.style.backgroundColor = "#d6d7d8";
}

document.addEventListener('DOMContentLoaded', function() {
	var elems = document.querySelectorAll('select');
	var instances = M.FormSelect.init(elems, 1);
});

$(document).ready(function() {
	$('textarea#comentarios').characterCounter();
});