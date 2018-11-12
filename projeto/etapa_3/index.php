<?php
    require_once('mysql.lib');
    require_once('util.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Início</title>

	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<!-- MENU -->
	<header id="main-header">
		<div class="parallax-container">
	      	<nav id="main-nav" class="transparent z-depth-0">
			    <div class="nav-wrapper">
			      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><img src="imgs/menu-white.png"></a>
			      <ul class="right hide-on-med-and-down">
			        <li><a href="./index.php">Principal</a></li>
			        <li><a href="./publicacoes.php">Publicações</a></li>
			        <li><a href="./projetos.php">Projetos</a></li>
			        <li><a href="./contato.php">Contato</a></li>
			      </ul>
			    </div>
			</nav>

			<ul class="sidenav" id="mobile-demo">
			    <li><a class="waves-effect waves-teal" href="./index.html">Principal</a></li>
			    <li><a class="waves-effect waves-teal" href="./publicacoes.html">Publicações</a></li>
			    <li><a class="waves-effect waves-teal" href="./projetos.html">Projetos</a></li>
			    <li><a class="waves-effect waves-teal" href="./contato.html">Contato</a></li>
			</ul>

	      	<div class="parallax">
	      		<img src="imgs/principal.jpg" height="1300px" />
			</div>
	      	<h1 class="white-text">Levy M. S. Santiago</h1>
	    </div>
	</header>

	<main class="container">
		<section>
			<h2>Sobre</h2>
			<article>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et elementum arcu. Quisque eu sollicitudin lacus. Cras at velit placerat, consequat diam vitae, euismod leo. Donec euismod sed odio ut molestie. Aliquam erat volutpat. Nunc et consequat ex. Duis in purus sed orci aliquet tincidunt id sit amet magna. Curabitur porttitor mi tempor porta elementum. Pellentesque vel mauris id sapien mollis fermentum. Maecenas luctus nisi sed est venenatis, et facilisis neque ultrices.
				</p>
			</article>
		</section>
		<section>
			<h2>Postagens recentes</h2>
			<article>
				<p>
					Cras tempus mi nisi. Integer sed vulputate neque. Ut bibendum sapien id turpis gravida rhoncus eu et odio. Etiam pretium tempor justo, ac vestibulum orci lacinia et. Fusce commodo posuere eros, non suscipit orci placerat at. Etiam ut nibh metus.
                </p><br/>
                
                <div class="row">
                    <?php
                    $sql="(SELECT id, titulo, date_format(data, '%d/%m/%Y') as data, descricao FROM `projetos` ORDER BY id DESC LIMIT 2)".
                    "union all".
                    "(SELECT id, \"Artigo\", date_format(data, '%d/%m/%Y') as data, titulo as descricao FROM `publicacoes` ORDER BY id DESC LIMIT 2)";
                    $result = mysqli_query($db_link, $sql);
                    while($row=mysqli_fetch_array($result)){
                        printRecentes($row['titulo'], $row['data'], $row['descricao']);
                    }
                    ?>
                </div>
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
 	<script src="script/scripts.js"></script>

</body>
</html>

<?php 
  require_once('mysql_close.lib');   	
?>