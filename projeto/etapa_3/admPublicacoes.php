<?php
    function move_header($str){
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        return ($host.$uri.'/'.$str); 
    }

    require_once('mysql.lib');
    require_once('admUtil.php');

    

    $form = &$_REQUEST;

    if(isset($form['submit'])){
      if($form['submit'] == 'excluir'){
        $sql = "DELETE FROM `publicacoes` WHERE id='".$form['id']."'";

        if(mysqli_query($db_link, $sql)){
            header("Location: http://".move_header('admPublicacoes.php?toast=d'));
        }else{
            header("Location: http://".move_header('admPublicacoes.php?toast=err'));
        }
      }else if($form['submit'] == 'editar'){
        $sql = "SELECT * FROM `publicacoes` WHERE id='".$form['hid']."'";
        $result = mysqli_query($db_link, $sql);
        $row = mysqli_fetch_array($result);
      }
      /*Validação*/
      else if(empty($form["titulo"])){
        $titulo_error = "Título é obrigatório";
      }else if(empty($form["evento"])){
        $evento_error = "Evento/Congresso é obrigatório";
      }else if(empty($form["cidade"])){
        $cidade_error = "Cidade é obrigatório";
      }else if(empty($form["ano"])){
        $ano_error = "Ano da Publicação é obrigatório";
      }else if(empty($form["link"])){
        $link_error = "Link é obrigatório";
      }else if(strlen($form["titulo"]) > 200){
        $titulo_error = "O campo Título permite no máximo 200 caracteres.";
      }else if(strlen($form["evento"]) > 200){
        $evento_error = "O campo Evento permite no máximo 200 caracteres.";
      }else if(strlen($form["cidade"]) > 72){
        $cidade_error = "O campo Cidade permite no máximo 72 caracteres.";
      }else if(strlen($form["anais"]) > 200){
        $anais_error = "O campo Anais permite no máximo 200 caracteres.";
      }else if(strlen($form["paginas"]) > 12){
        $paginas_error = "O campo Páginas permite no máximo 12 caracteres.";
      }else if(strlen($form["ano"]) > 4){
        $ano_error = "O campo Ano permite no máximo 5 caracteres.";
      }else if(strlen($form["link"]) > 255){
        $link_error = "O campo Link permite no máximo 255 caracteres.";
      }
      /*Fim Validação*/

      else if($form['submit'] == 'modificar'){
        $sql = "UPDATE `publicacoes` SET titulo='".$form['titulo']."', ".
                                        "evento='".$form['evento']."', ".
                                        "cidade='".$form['cidade']."', ".
                                        "anais='".$form['anais']."', ".
                                        "paginas='".$form['paginas']."', ".
                                        "ano='".$form['ano']."', ".
                                        "link='".$form['link']."' WHERE id='".$form['hid']."'";
        if(mysqli_query($db_link, $sql)){
            header("Location: http://".move_header('admPublicacoes.php?toast=u'));
        }else{
            header("Location: http://".move_header('admPublicacoes.php?toast=err'));
        }
      }else if($form['submit'] == 'inserir'){
        echo "ola";
        $sql="INSERT INTO `publicacoes` (titulo, evento, cidade, anais, paginas, ano, link, data, user) 
            VALUES ('{$form['titulo']}','{$form['evento']}', '{$form['cidade']}', 
            '{$form['anais']}', '{$form['paginas']}', '{$form['ano']}', '{$form['link']}', current_date(),
            '1')";
        if(mysqli_query($db_link, $sql)){
            header("Location: http://".move_header('admPublicacoes.php?toast=c'));
        }else{
            header("Location: http://".move_header('admPublicacoes.php?toast=err'));
        }
      }

    }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Portifolio ADM</title>

  <link rel="stylesheet" type="text/css" href="admStyle.css">
  <!-- Compiled and minified CSS (Materialize) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
</head>

<body>

  <header>
    <?php
        printNavBar();
    ?>

    <h1 class="center-align">Publicações</h1>
  </header>

  <main class="container">
    <section>
      <?php 
        // FORM DE CADASTRO PUBLICAÇÃO
        printFormCadastroPublicacao($titulo_error, $evento_error, $cidade_error, 
            $anais_error, $paginas_error, $ano_error, $link_error, $row, $form);

        // LISTANDO PUBLICAÇÕES
        echo "<h2 class=\"center-align\">Publicações cadastradas</h2>";
        $sql="SELECT * FROM `publicacoes`";
        $result = mysqli_query($db_link, $sql);
        while($row=mysqli_fetch_array($result)){
            printPublicacoes($row['id'], $row['titulo'], $row['evento'], $row['cidade'], 
            $row['anais'], $row['paginas'], $row['ano'], $row['link']);
        }
      ?>
    </section>
  </main>

  <?php
    printFooter();
  ?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="script/valida.js"></script>

  <?php
  /*Imprimindo mensagem de confirmação*/
  if(isset($_GET['toast'])){
    if($_GET['toast'] == 'u'){
      ?>
      <script>M.toast({html: 'Publicação modificada com sucesso!', classes: 'rounded'});</script>
      <?php
    }else if($_GET['toast'] == 'c'){
      ?>
      <script>M.toast({html: 'Publicação criada com sucesso!', classes: 'rounded'});</script>
      <?php
    }else if($_GET['toast'] == 'd'){
      ?>
      <script>M.toast({html: 'Publicação deletada com sucesso!', classes: 'rounded'});</script>
      <?php
    }else{
      ?>
      <script>M.toast({html: 'Erro ao modificar publicação', classes: 'rounded'});</script>
      <?php
    }
  }
  ?>

</body>

</html>

<?php 
  require_once('mysql_close.lib');   	
?>