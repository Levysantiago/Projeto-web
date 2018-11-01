<?php 
  function move_header($str){
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    return ($host.$uri.'/'.$str); 
  }

  require_once('mysql.lib');
  
  $titulo_error = "";
  $descricao_error = "";
  $link_error = "";
  $form = &$_REQUEST;
  $row['titulo'] = "";
  $row['descricao'] = "";
  $row['link'] = "";

  if(isset($form['submit'])){
    if($form['submit'] == 'editar'){
      $sql = "SELECT * FROM `projetos` WHERE id='".$form['hid']."'";
      $result = mysqli_query($db_link, $sql);
      $row = mysqli_fetch_array($result);
    }else if($form['submit'] == 'modificar'){
      $sql = "UPDATE `projetos` SET titulo='".$form['titulo']."', ".
                                    "descricao='".$form['descricao']."', ".
                                    "link='".$form['link']."' WHERE id='".$form['hid']."'";
      if(mysqli_query($db_link, $sql)){
        header("Location: http://".move_header('admProjetos.php?toast=u'));
      }else{
        header("Location: http://".move_header('admProjetos.php?toast=err'));
      }
    }else if($form['submit'] == 'excluir'){
      $sql = "DELETE FROM `projetos` WHERE id='".$form['id']."'";

      if(mysqli_query($db_link, $sql)){
        header("Location: http://".move_header('admProjetos.php?toast=d'));
      }else{
        header("Location: http://".move_header('admProjetos.php?toast=err'));
      }
    }else if($form['submit'] == 'inserir'){
      if(empty($form["titulo"])){
        $titulo_error = "Título é obrigatório";
      }else if(empty($form["descricao"])){
        $descricao_error = "Descrição é obrigatória";
      }else if(empty($form["link"])){
        $link_error = "Link é obrigatório";
      }else{
        $sql="INSERT INTO `projetos` (titulo, descricao, link, user) 
          VALUES ('{$form['titulo']}','{$form['descricao']}', '{$form['link']}', '1')";
        if(mysqli_query($db_link, $sql)){
          header("Location: http://".move_header('admProjetos.php?toast=c'));
        }else{
          header("Location: http://".move_header('admProjetos.php?toast=err'));
        }
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
    <nav class="blue-grey darken-3">
      <div class="nav-wrapper">
        <ul id="nav-mobile" class="left">
          <li><a href="admPublicacoes.php">Publicações</a></li>
          <li><a href="admProjetos.php">Projetos</a></li>
        </ul>
      </div>
    </nav>

    <h1 class="center-align">Projetos</h1>
  </header>

  <main class="container">
    <section>
      <!-- CARD DE CADASTRO PROJETOS -->
      <div class="row">
        <div class="col s12">
          <div class="card white">
            <div class="card-content">
              <span class="card-title">Adicionar novo projeto</span>
              <div class="row">
                <form name="form" class="col s12" action="" method="POST" onsubmit="return validaFormProjetos(this);">

                  <div class="row">
                    <div class="input-field col s12">
                      <input type="text" id="titulo" name="titulo" placeholder="Ex.: Meu Projeto" class="validate" value="<?php echo($row['titulo']); ?>">
                      <label for="titulo">Título</label>
                      <?php echo "<span class=\"helper-text red-text\" data-error=\"Título é obrigadório\">$titulo_error</span>" ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="descricao" name="descricao" placeholder="Ex.: Este projeto tem como objetivo..." class="materialize-textarea truncate"
                        data-length="255"><?php echo($row['descricao']); ?></textarea>
                      <label for="descricao">Descrição</label>
                      <?php echo "<span class=\"helper-text red-text\" data-error=\"Descrição é obrigatória\">$descricao_error</span>" ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <input type="text" id="link" name="link" placeholder="Ex.: http://meuprojeto.com" class="validate" value="<?php echo($row['link']); ?>">
                      <label for="link">Link para conteúdo/página</label>
                      <?php echo "<span class=\"helper-text red-text\" data-error=\"Link é obrigatório\">$link_error</span>" ?>
                    </div>
                  </div>

                  <div class="card-action">
                    <div class="row">
                      <?php if(isset($form['hid'])){
                        ?>
                        <button class="waves-effect waves-light btn green col s4 l2 offset-s4 offset-l5" type="submit" name="submit" value="modificar">Modificar</button>
                        <?php
                      } else{
                        ?>
                        <button class="waves-effect waves-light btn green col s4 l2 offset-s4 offset-l5" type="submit" name="submit" value="inserir">Confirmar</button>
                        <?php
                      }?>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / CARD DE CADASTRO PROJETOS -->

      <h2 class="center-align">Projetos cadastrados</h2>
      <?php
        function printProjeto($id, $titulo, $descricao){
          ?>
          <!-- CARD DE PROJETOS CADASTRADOS-->
          <div class="row">
            <div class="col s12 l6">
              <div class="card white hoverable small">
                <div class="card-content white">
                  <span class="card-title activator grey-text text-darken-4"><?php echo $titulo ?>
                    <i class="material-icons right">more_vert</i>
                  </span>
                  <p><?php echo $descricao ?></p>
                </div>
                <div class="card-reveal blue-grey darken-3">
                  <span class="card-title white-text text-darken-4 truncate"><?php echo $titulo ?>
                    <i class="material-icons right">close</i>
                  </span>
                  <div class="row"></div>
                  <div class="row action">
                    <a class="waves-effect waves-light btn blue darken-2 col s6 offset-s3" href="admProjetos.php?hid=<?php echo $id?>&submit=editar">editar</a>
                  </div>
                  <div class="row">
                    <form name="formDelete" action="" method="GET" onsubmit="return confirmDelete('Você tem certeza que quer deletar este projeto?');">
                      <input name="id" value="<?php echo $id ?>" type="hidden">
                      <button class="waves-effect waves-light btn red darken-4 col s4 offset-s4" type="submit" name="submit" value="excluir">excluir</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- / CARD DE PROJETOS CADASTRADOS-->
            <?php
        }
        
        $sql="SELECT * FROM `projetos`";
        $result = mysqli_query($db_link, $sql);
        while($row=mysqli_fetch_array($result)){
          printProjeto($row['id'], $row['titulo'], $row['descricao']);
        }
        
        ?>


    </section>
  </main>

  <footer class="page-footer blue-grey darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Sobre</h5>
          <p class="grey-text text-lighten-4">Sistema administrativo de portifólio criado por Levy Santiago</p>
        </div>
        <div class="col l4 offset-l2 s12">
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="row right">
        <a class="col s6 grey-text text-lighten-4" href="admPublicacoes.html">Publicações</a>
        <a class="col s6 grey-text text-lighten-4" href="admProjetos.html">Projetos</a>
      </div>
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="script/scripts.js"></script>
  <script src="script/valida.js"></script>

  <?php
    if(isset($_GET['did'])){
      ?>
      <!-- Modal Structure (Dialog Box) -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Confirmação</h4>
          <p>Você tem certeza que quer deletar este projeto?</p>
        </div>
        <div class="modal-footer">
          <a class="modal-action modal-close waves-effect waves-green btn-flat">Não</a>
          <a href="admProjetos.php?did=<?php echo $_GET['did'];?>&submit=excluir" class=" modal-action modal-close waves-effect waves-green btn-flat">Sim</a>
        </div>
      </div>

      <script>
        $(".modal-trigger").click(
          function(){
            let id = $(this).attr("id");

            /*if(confirm("Você tem certeza que quer deletar este projeto?")){
              $.ajax({
                url: 'admProjetos.php',
                type: 'GET',
                data: {id: id},
                error: function(){
                  alert("Não foi possível remover projeto");
                },
                success: function(data){
                  $("#"+id).remove();
                  alert("Registro removido.");
                }
              });
            }*/
          }
        );
      </script>
      
      <?php
    }

    if(isset($_GET['toast'])){
      if($_GET['toast'] == 'u'){
        ?>
        <script>M.toast({html: 'Projeto modificada com sucesso!', classes: 'rounded'});</script>
        <?php
      }else if($_GET['toast'] == 'c'){
        ?>
        <script>M.toast({html: 'Projeto criada com sucesso!', classes: 'rounded'});</script>
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