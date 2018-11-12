<?php
    require_once('util.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Contato</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<!-- MENU -->
	<header>
		<div class="parallax-container">
            <?php
            printMenu();
            ?>

			<ul class="sidenav" id="mobile-demo">
			    <li><a class="waves-effect waves-teal" href="./index.html">Principal</a></li>
			    <li><a class="waves-effect waves-teal" href="./publicacoes.html">Publicações</a></li>
			    <li><a class="waves-effect waves-teal" href="./projetos.html">Projetos</a></li>
			    <li><a class="waves-effect waves-teal" href="./contato.html">Contato</a></li>
			</ul>

	      	<h1>Contato</h1>
	    </div>
	</header>

	<main class="container">
		<section>
			<article>

				<!-- CARD DE CONTATO -->
		  		<div class="row">
		        <div class="col s12">
		          <div class="card">
		            <div class="card-content">
		              <span class="card-title">Formulário de contato</span>
		              <div class="row">
		                <form class="col s12">
							<div class="input-field col s12 l6">
							  <input id="first_name" type="text" class="validate">
							  <label for="first_name">Primeiro Nome</label>
							</div>

							<div class="input-field col s12 l6">
					          <input id="last_name" type="text" class="validate">
					          <label for="last_name">Último Nome</label>
					        </div>

					        <div class="input-field col s12">
					          <input id="email" type="email" class="validate">
					          <label for="email">Email</label>
					        </div>

					        <div class="input-field col s12">
								<input type="text" name="assunto">
								<label>Assunto </label>
					        </div>

		                    <div class="input-field col s12">
		                      <textarea id="mensagem" class="materialize-textarea" data-length="200"></textarea>
		                      <label for="mensagem">Mensagem</label>
		                    </div>
						</form>
		              </div>
		            </div>
		            <div class="card-action">
		              <div class="row">
		                <a class="waves-effect waves-light btn green col s4 l2 offset-s4 offset-l5">enviar</a>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		      <!-- / CARD DE CONTATO -->
			</article>
		</section>
	</main>
	
	<!-- FOOTER -->
    <?php
    footer();
    ?>

	<!-- Compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 	<script src = "script/scripts.js"></script>

</body>
</html>