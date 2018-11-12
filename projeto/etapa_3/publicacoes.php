<?php
    require_once('mysql.lib');
    require_once('util.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Publicações</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<!-- MENU -->
	<header>
        <?php
        printMenu();
        ?>
        <h1>Publicações</h1>
	</header>

	<main class="container">
		<section>

            <div class="row">
                <?php
                // LISTANDO PROJETOS
                $sql="SELECT * FROM `publicacoes`";
                $result = mysqli_query($db_link, $sql);
                while($row=mysqli_fetch_array($result)){
                    printPublicacoes($row['titulo'], $row['evento'], $row['cidade'],
                        $row['anais'], $row['paginas'], $row['ano'], $row['link']);
                }
                ?>
            </div>
			<!-- <article>
				<p>Pellentesque interdum lectus sed quam ornare hendrerit. Morbi id iaculis sem. In in est lacus. Vestibulum malesuada vehicula velit, quis tempus ex sagittis vitae. Sed bibendum ultricies ipsum, vitae porta mi maximus in. Curabitur facilisis fermentum lorem, at posuere erat feugiat sed. Donec tortor nisl, pellentesque id purus et, feugiat auctor orci.</p>

				<h2>Artigos:</h2>

				<div class="row">
					<a href="http://br-ie.org/pub/index.php/wcbie/article/view/7485">
						<div class="col s12">
					      <div class="card hoverable">

					        <div class="card-content white-text">
					        	<span class="card-title">Avaliação de linguagens visuais de programação no ensino médio a partir da utilização do conceito de Robótica Pedagógica.</span>
					        	<p><b>Local:</b> VI Congresso Brasileiro de Informática na Educação, Recife</p>
								<p><b>Ano:</b> 2017</p>
								<p><b>Em:</b> Anais dos Workshops do Congresso Brasileiro de Informática na Educação (CBIE), p. 962-971</p>
					        </div>
					        <div class="card-action">
					          <a href="http://br-ie.org/pub/index.php/wcbie/article/view/7485">Link Anais</a>
					        </div>
					      </div>
					    </div>
					</a>

				    <a href="https://drive.google.com/file/d/1m7rEnwgkHGoOUowkV6Vdm-x7T02h8TRI/view?usp=sharing">
					    <div class="col s12">
					      <div class="card hoverable">

					        <div class="card-content white-text">
					        	<span class="card-title">Redes Sociais na educação - Revisão de softwares de Redes Sociais como ferramentas educaionais.</span>
					        	<p><b>Local:</b> XVII ESCOLA REGIONAL DE COMPUTAÇÃO BAHIA - ALAGOAS - SERGIPE, Cruz das Almas</p>
								<p><b>Ano:</b> 2017</p>
								<p><b>Em:</b> Anais Workshop de Educação e Informática Bahia-Alagoas-Sergipe (WEIBASE), p. 36-45</p>
					        </div>
					        <div class="card-action">
					          <a href="https://drive.google.com/file/d/1m7rEnwgkHGoOUowkV6Vdm-x7T02h8TRI/view?usp=sharing">Link Anais</a>
					        </div>
					      </div>
					    </div>
					</a>

				    <a href="https://drive.google.com/file/d/1m7rEnwgkHGoOUowkV6Vdm-x7T02h8TRI/view?usp=sharing">
					    <div class="col s12">
					      <div class="card hoverable">

					        <div class="card-content white-text">
					        	<span class="card-title">Analise de softwares de virtualização de objetos eletrônicos para utilização em projetos de ensino que utilizem o conceito de Internet das Coisas: Protoboard Virtual e Plataforma Arduíno.</span>
					        	<p><b>Local:</b> XVII ESCOLA REGIONAL DE COMPUTAÇÃO BAHIA - ALAGOAS - SERGIPE, Cruz das Almas</p>
								<p><b>Ano:</b> 2017</p>
								<p><b>Em:</b> Anais Workshop de Educação e Informática Bahia-Alagoas-Sergipe (WEIBASE), p. 46-55</p>
					        </div>
					        <div class="card-action">
					          <a href="https://drive.google.com/file/d/1m7rEnwgkHGoOUowkV6Vdm-x7T02h8TRI/view?usp=sharing">Link Anais</a>
					        </div>
					      </div>
					    </div>
					</a>
				</div>
			</article> -->
		</section>
	</main>

	<!-- FOOTER -->
    <?php
    footer();
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 	<script src="script/scripts.js"></script>
</body>

</html>

<?php 
  require_once('mysql_close.lib');   	
?>