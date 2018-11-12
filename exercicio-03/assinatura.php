<!DOCTYPE html>
<html>
<head>
	<title>Confirmação</title>
	<meta charset="utf-8">

	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

	<h1 align="center">Ficha de cadastro</h1>

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
				<div class=\"col s6\">
					$data
				</div>
			</div>";
		}

	 ?>

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
						printLine("Data Nascimento:", writeEmpty($_POST['data-nasc']));
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
						printLine("Horário para avisos:", writeEmpty($_POST['horario-avisos']));
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
		    <div class="card-action">
		      <a href="#">This is a link</a>
		      <a href="#">This is a link</a>
		    </div>
		  </div>
		</div>
	</div>

	<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>