<?php 
  function move_header($str){
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    return ($host.$uri.'/'.$str); 
  }

  require_once('mysql.lib');
  require_once('admUtil.php');
  
  /*Variáveis de erro*/
  $titulo_error = "";
  $descricao_error = "";
  $link_error = "";
  $row['titulo'] = "";
  $row['descricao'] = "";
  $row['link'] = "";
  
  $form = &$_REQUEST;
  
  if(isset($form['submit'])){

    if($form['submit'] == 'editar'){
        $sql = "SELECT * FROM `projetos` WHERE id='".$form['hid']."'";
        $result = mysqli_query($db_link, $sql);
        $row = mysqli_fetch_array($result);
    }else if($form['submit'] == 'excluir'){
        $sql = "DELETE FROM `projetos` WHERE id='".$form['id']."'";

        if(mysqli_query($db_link, $sql)){
        header("Location: http://".move_header('admProjetos.php?toast=d'));
        }else{
        header("Location: http://".move_header('admProjetos.php?toast=err'));
        }
    }

    /*Validação*/
    else if(empty($form['titulo'])){
        $titulo_error = "Título é obrigatório";
    }else if(empty($form['descricao'])){
        $descricao_error = "Descrição é obrigatória";
    }else if(empty($form['link'])){
        $link_error = "Link é obrigatório";
    }else if(strlen($form['titulo']) > 120 ){
        $titulo_error = "O campo título permite no máximo 120 caracteres.";
    }else if(strlen($form['descricao']) > 400 ){
        $titulo_error = "O campo descricao permite no máximo 400 caracteres.";
    }else if(strlen($form['link']) > 255 ){
        $titulo_error = "O campo título permite no máximo 255 caracteres.";
    }
    /* Fim Validação*/

    else if($form['submit'] == 'modificar'){
      $sql = "UPDATE `projetos` SET titulo='".$form['titulo']."', ".
                                    "descricao='".$form['descricao']."', ".
                                    "link='".$form['link']."' WHERE id='".$form['hid']."'";
      if(mysqli_query($db_link, $sql)){
        header("Location: http://".move_header('admProjetos.php?toast=u'));
      }else{
        header("Location: http://".move_header('admProjetos.php?toast=err'));
      }
    }else if($form['submit'] == 'inserir'){
      $sql="INSERT INTO `projetos` (titulo, descricao, link, data, user) 
        VALUES ('{$form['titulo']}','{$form['descricao']}', '{$form['link']}', current_date() , '1')";
      if(mysqli_query($db_link, $sql)){
        header("Location: http://".move_header('admProjetos.php?toast=c'));
      }else{
        header("Location: http://".move_header('admProjetos.php?toast=err'));
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

    <h1 class="center-align">Projetos</h1>
  </header>

  <main class="container">
    <section>
      
      <?php
        // FORM DE CADASTRO PROJETO
        printFormCadastroProjeto($titulo_error, $descricao_error, $link_error, $row, $form);
      ?>

      <?php
        // LISTANDO PROJETOS
        echo "<h2 class=\"center-align\">Projetos cadastrados</h2>";
        $sql="SELECT * FROM `projetos`";
        $result = mysqli_query($db_link, $sql);
        while($row=mysqli_fetch_array($result)){
          printProjetos($row['id'], $row['titulo'], $row['descricao'], $row['link']);
        }
        ?>


    </section>
  </main>

  <?php
    printFooter();
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="script/scripts.js"></script>
  <script src="script/valida.js"></script>

  <?php
    if(isset($_GET['toast'])){
      if($_GET['toast'] == 'u'){
        ?>
        <script>M.toast({html: 'Projeto modificado com sucesso!', classes: 'rounded'});</script>
        <?php
      }else if($_GET['toast'] == 'c'){
        ?>
        <script>M.toast({html: 'Projeto criado com sucesso!', classes: 'rounded'});</script>
        <?php
      }else if($_GET['toast'] == 'd'){
        ?>
        <script>M.toast({html: 'Projeto deletado com sucesso!', classes: 'rounded'});</script>
        <?php
      }else{
        ?>
        <script>M.toast({html: 'Erro ao modificar projeto', classes: 'rounded'});</script>
        <?php
      }
    }
  ?>


</body>

</html>

<?php 
  require_once('mysql_close.lib');   	
?>