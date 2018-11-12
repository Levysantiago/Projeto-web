<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

	<?php
		function writeEmpty($text){
			return $text == "" ? "-----" : $text;
		}

		function getRec($color){
			return "<div style='background-color: $color; width: 15px; height: 15px;'></div>";;
		}

		function printLine($title, $data){
			echo "<div class=\"col s12\">
				<div class=\"col s6\">
					<b>$title</b>
				</div>
				<div class=\"col s6 truncate\">
					$data
				</div>
			</div>";
		}

		function printForm(){
			?>
				<h1 align="center">Formulário</h1>

				<form name="form" action="form.php" method="POST" onsubmit="return validaForm(this);">
					
					<div class="row">
						<div class="col s12">
						  <div class="card white">
						    <div class="card-content">
						    
						      <span class="card-title">Dados Pessoais</span>
								<div class="row">
									<div class="col s12">
										<div class="col s6">
											<label>Login*: </label>
											<input oninput="resetInputStyle(this)" type="email" name="login" required>
										</div>
										<div class="col s6">
											<label>Senha*: </label>
											<input oninput="resetInputStyle(this)" type="password" name="password" 
											pattern="(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,10}"
											title="Senha deve incluir letras, números e caracteres especiais; não menor que 6 caracteres e no máximo 10" required>
										</div>
										<div class="col s6">
											<label>Nome Completo*: </label>
											<input onkeydown="resetInputStyle(this)" type="text" name="nome" required>
										</div>
										<div class="col s6">
											<label>Telefone*: </label>
											<input oninput="resetInputStyle(this)" pattern="[0-9]{2}-[0-9]{5} [0-9]{4}" 
											placeholder="00-00000 0000" title="00-00000 0000" type="tel" name="tel" required>
										</div>
										<div class="col s3">
											<label>Idade: </label>
											<input oninput="resetInputStyle(this)" type="number" max="200" min="18" name="idade">
										</div>
										<div class="col s3">
											<label>Data de Nascimento:</label>
											<input oninput="resetInputStyle(this)" type="date" name="nasc">
										</div>
										<div class="col s3">
											<label>Sexo: </label><br>
											<div>
												<select name="sexo">
													<option value="" selected>Selecione o sexo</option>
													<option value="Masculino">Masculino</option>
													<option value="Feminino">Feminino</option>
											    </select>
											</div>
										</div>
										<div class="col s3">
											<label>Peso: </label>
											<input oninput="resetInputStyle(this)" type="number" name="peso">
										</div>
										<div class="col s3">
											<label>Cor Preferida*:</label>
											<input type="color" name="color" value="#000ff0">
										</div>
									</div>
								</div>
						    </div>
						  </div>
						</div>
					</div>


					<div class="row">
						<div class="col s12">
						  <div class="card white">
						    <div class="card-content">
						    	<span class="card-title">Dados Adicionais</span>

								<div class="row">
									<div class="col s12">
										<div class="col s6">
											<div id="checkbox-group" class="checkbox-group col s12">
												<label>Preferências de Conteúdo*: </label>
												<p>
											      <label>
											        <input type="checkbox" name="conteudos[]" value="Cinema">
											        <span>Cinema</span>
											      </label>
											    </p>
											    <p>
											      <label>
											        <input type="checkbox" name="conteudos[]" value="Esportes">
											        <span>Esportes</span>
											      </label>
											    </p>
											    <p>
											      <label>
											        <input type="checkbox" name="conteudos[]" value="Literatura">
											        <span>Literatura</span>
											      </label>
											    </p>
											    <p>
											      <label>
											        <input type="checkbox" name="conteudos[]" value="Música">
											        <span>Música</span>
											      </label>
											    </p>
											    <p>
											      <label>
											        <input type="checkbox" name="conteudos[]" value="Jogos Eletrônicos">
											        <span>Jogos Eletrônicos</span>
											      </label>
											    </p>
											</div>
										</div>
										
										<div class="col s6">
											<label>Comentários:</label>
											<textarea id="comentarios" name="comentarios" class="materialize-textarea" data-length="120"></textarea>
										</div>
										<div class="col s6">
											<label>Horário para recebimento de avisos:</label>
											<input type="time" name="horario">
										</div>
									</div>
								</div>
						    </div>
						  </div>
						</div>
					</div>

					<div class="row">
						<div class="col s12">
						  <div class="card white">
						    <div class="card-content">
						      <span class="card-title">Pagamento</span>
								<div class="row">
									<h3>Pagamento</h3>
									<div class="col s12">
										<div class="col s6">
											<div>
												<label>Pagamento à vista*: </label>
												<select id="pagamento" name="pagamento">
													<option value="Sim">Sim</option>
													<option value="Não">Não</option>
											    </select>
											</div>
										</div>

										<div class="col s6">
											<label>Tipo de cartão de crédito*:</label>
											<div>
												<select id="cartao" name="cartao" onchange="resetComboBox(this)">
													<option value="Default" selected>Selecione o cartão</option>
													<option value="Visa">Visa</option>
													<option value="Master">Master</option>
													<option value="American">American</option>
											    </select>
											</div>
										</div>
									</div>
								</div>
						    </div>
						  </div>
						</div>
					</div>


					<div class="row">
						<div class="col s6">
							<button class="btn-large waves-effect grey darken-1 col s10 offset-s1" type="reset" name="reset">Limpar</button>
						</div>
						<div class="col s6">
							<button class="btn-large waves-effect waves-light col s10 offset-s1" type="submit" name="submit">Enviar</button>
						</div>
					</div>
				</form>

			<?php
		} #Fecha função printForm

		function printFicha(){
			?>

				<h1 align="center">Ficha de cadastro</h1>
				<div class="row">
					<div class="col s6 offset-s3">
					  <div class="card white">
					    <div class="card-content">
							<span class="card-title">Dados Pessoais</span>
							<div class="row">
								<?php
									printLine("Login:", $_POST['login']);
									printLine("Nome:", $_POST['nome']);
									printLine("Telefone:", $_POST['tel']);
									printLine("Idade:", $_POST['idade']);
									printLine("Data Nascimento:", writeEmpty($_POST['nasc']));
									printLine("Sexo:", writeEmpty($_POST['sexo']));
									printLine("Peso:", writeEmpty($_POST['peso']));
									printLine("Cor:", getRec($_POST['color']));
								?>
							</div>

							<span class="card-title">Dados Adicionais</span>
							<div class="row">
								<?php
									/*Obtendo todos os conteúdos selecionados*/
									$conteudo = "";
									if(!empty($_POST['conteudos'])){
										foreach ($_POST['conteudos'] as $selected) {
											$conteudo = $conteudo.$selected."<br>";
										}
									}else{
										echo "ERROR!!!";
									}
									printLine("Conteúdo:", $conteudo);
									printLine("Comentários:", writeEmpty($_POST['comentarios']));
									printLine("Horário para avisos:", writeEmpty($_POST['horario']));
								?>
							</div>
							<span class="card-title">Pagamento</span>
							<div class="row">
								<?php
									printLine("Pagamento à Vista:", $_POST['pagamento']);
									printLine("Cartão:", $_POST['cartao']);
								?>
							</div>
					    </div>
					  </div>
					</div>
				</div>

			<?php
		} #Fecha função printFicha

		function alert($msg){
			echo '<script type="text/javascript">alert("' . $msg . '")</script>';
		}

		if(isset($_POST['submit'])){
			if(empty($_POST['login'])){
				printForm();
				alert("O campo 'Login' é obrigatório.");
			}else if(empty($_POST['password'])){
				printForm();
				alert("O campo 'Senha' é obrigatório.");
			}else if(empty($_POST['nome'])){
				printForm();
				alert("O campo 'Nome Completo' é obrigatório.");
			}else if(empty($_POST['tel'])){
				printForm();
				alert("O campo 'Telefone' é obrigatório.");
			}else if(empty($_POST['conteudos'])){
				printForm();
				alert("O campo 'Preferências de Conteúdo' é obrigatório.");
			}else if(empty($_POST['pagamento'])){
				printForm();
				alert("O campo 'Pagamento à vista' é obrigatório.");
			}else if(empty($_POST['cartao'])){
				printForm();
				alert("O campo 'Tipo de cartão de crédito' é obrigatório.");
			}else if(empty($_POST['color'])){
				printForm();
				alert("O campo 'Cor Preferida' é obrigatório.");
			}else if($_POST['login'] == "admin@localhost.com"){
				printForm();
				alert("Insira um novo email.");
			}else{
				printFicha();
			}
		#Mostrando o formulário
		}else{ 
 			printForm();
 		}

 	?>


	<!-- Compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<script type="text/javascript" src="validacao.js"></script>

</body>
</html>