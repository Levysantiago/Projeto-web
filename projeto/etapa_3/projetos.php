<?php
    require_once('mysql.lib');
    require_once('util.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Projetos</title>

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
        <h1>Projetos</h1>
	</header>

	<main class="container">
		<section>
            <div class="row">
                <?php
                // LISTANDO PROJETOS
                $sql="SELECT * FROM `projetos`";
                $result = mysqli_query($db_link, $sql);
                while($row=mysqli_fetch_array($result)){
                    printProjetos($row['titulo'], $row['descricao'], $row['link']);
                }
                ?>
            </div>
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