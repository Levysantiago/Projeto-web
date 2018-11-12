<?php
    function move_header($str){
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        return ($host.$uri.'/'.$str); 
    }

    require_once('mysql.lib');
    require_once('util.php');

    $form = &$_POST;

    $email = "";

    /*Variáveis de erro*/
    $email_error = "";
    $senha_error = "";
    $login_error = "";

    if(isset($form['submit'])){
        /*Validação*/
        if(empty($form['email'])){
            $email_error = "Email é obrigatório!";
        }
        if(empty($form['senha'])){
            $email = $form['email'];
            $senha_error = "Senha é obrigatória!";
        }
        /* / Validação*/
        else{
            $sql = "SELECT email, senha FROM `user`";
            $result = mysqli_query($db_link, $sql);
            $row = mysqli_fetch_array($result);
            
            $email_db = sha1(2421 . $form['email']);
            $senha_db = sha1(362 . $form['senha']);

            if($email_db == $row['email'] && $senha_db == $row['senha']){
                header("Location: http://".move_header('admPublicacoes.php'));
            }else{
                $email = $form['email'];
                $login_error = "Email e/ou Senha incorretos!";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<!-- Compiled and minified CSS (Materialize) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
</head>
<body>

	<header>
		<h1 class="center-align">Página de Login</h1>
	</header>

	<main class="container">
		<section>
			<div class="valign-wrapper row login-box">
			  <div class="col card hoverable s12 m6 offset-m3">
			    <form action="" method="POST">
			      <div class="card-content">
			        <span class="card-title">Realize seu login</span>
			        <div class="row">
			          <div class="input-field col s12">
			            <label for="email">Email *</label>
                        <input type="email" class="validate" name="email" id="email" value="<?php echo $email ?>" />
                        <?php echo "<span class=\"helper-text red-text\" data-error=\"Email é obrigatório!\">$email_error</span>" ?>
			          </div>
			          <div class="input-field col s12">
			            <label for="senha">Senha *</label>
                        <input type="password" class="validate" name="senha" id="senha" />
                        <?php echo "<span class=\"helper-text red-text\" data-error=\"Senha é obrigatória!\">$senha_error</span>" ?>
			          </div>
			        </div>
                  </div>
                  <?php echo "<span class=\"helper-text red-text\" data-error=\"Email e/ou Senha incorretos!\">$login_error</span>" ?>
			      <div class="card-action right-align">
			        <button class="btn green waves-effect waves-light" type="submit" name="submit">Login</button>
			      </div>
			    </form>
			  </div>
            </div>
	  </section>
	</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>

<?php 
  require_once('mysql_close.lib');   	
?>