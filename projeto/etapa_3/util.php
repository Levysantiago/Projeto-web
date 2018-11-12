<?php
    function printMenu(){
        ?>
        <div class="parallax-container">
	      	<nav class="transparent z-depth-0">
			    <div class="nav-wrapper">
			      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><img src="imgs/menu.png"></a>
			      <ul class="right hide-on-med-and-down">
			        <li><a href="./index.php">Principal</a></li>
			        <li><a href="./publicacoes.php">Publicações</a></li>
			        <li><a href="./projetos.php">Projetos</a></li>
			        <li><a href="./contato.php">Contato</a></li>
			      </ul>
			    </div>
			</nav>

			<ul class="sidenav" id="mobile-demo">
			    <li><a class="waves-effect waves-teal" href="./index.php">Principal</a></li>
			    <li><a class="waves-effect waves-teal" href="./publicacoes.php">Publicações</a></li>
			    <li><a class="waves-effect waves-teal" href="./projetos.php">Projetos</a></li>
			    <li><a class="waves-effect waves-teal" href="./contato.php">Contato</a></li>
			</ul>
	    </div>
        <?php
    }

    function printProjetos($titulo, $descricao, $link){
        ?>
        <div class="col s12 l6">
            <a href="<?php echo $link ?>">
                <div class="card hoverable medium">

                <div class="card-content">
                    <span class="card-title"><?php echo $titulo ?></span>
                    <p><?php echo $descricao ?></p>
                </div>
                <div class="card-action">
                    <img width="90px" src="imgs/github.jpg" alt="Link para o github do projeto">
                </div>
                </div>
            </a>
        </div>
        <?php
    }

    function printPublicacoes($titulo, $evento, $cidade, $anais, $paginas, $ano, $link){
        ?>
        <a href="<?php echo $link ?>">
            <div class="col s12">
                <div class="card hoverable">

                <div class="card-content white-text">
                    <span class="card-title"><?php echo $titulo ?></span>
                    <p><b>Local:</b> <?php echo $evento . ", " . $cidade ?></p>
                    <p><b>Ano:</b> <?php echo $ano ?></p>
                    <p><b>Em:</b> <?php echo $anais . ", " . $paginas ?></p>
                </div>
                <div class="card-action">
                    <a href="<?php echo $link ?>">Link Anais</a>
                </div>
                </div>
            </div>
        </a>
        <?php
    }

    function printRecentes($titulo, $data, $descricao){
        $dest = "projetos.php";
        if($titulo == "Artigo"){
            $dest = "publicacoes.php";
        }
        ?>
        <a class="left" href="<?php echo $dest ?>">
            <div class="col s12 m6">
                <div class="card hoverable small">

                <div class="card-content white-text">
                    <span class="card-title"><?php echo $titulo ?></span>
                    <p class="dateText"><?php echo $data ?></p>
                    <p><?php echo $descricao ?></p>
                    
                </div>
                <div class="card-action">
                    <a class="right" href="<?php echo $dest ?>">Mais</a>
                </div>
                </div>
            </div>
        </a>
        <?php
    }

    function footer(){
        ?>
        <footer class="page-footer white">
		<div class="divider"></div>
          <div class="container">
            <div class="row">
              <div class="col l4 m6 s12">
                <h4 class="grey-text">Sobre</h4>
                <ul>
                  <p class="text-lighten-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et elementum arcu. Quisque eu sollicitudin lacus.</p>
                </ul>
              </div>
              <div class="col l6 offset-l2 m6 s12">
                <h4 class="grey-text">Contato</h4>
                <div class="row">
                	<div class="col s1 m2 valign-wrapper">
                		<img class="img-footer" src="imgs/email.jpg" alt="Endereço de email" />
						<p class="text-lighten-4 left-align">levyssantiago@gmail.com</p></p>
					</div>
				</div>
				<div class="row">
					<div class="col s1 m2 valign-wrapper">
						<img class="img-footer" src="imgs/github-circle.jpg" alt="Usuário github" />
						<p class="text-lighten-4">levysantiago</p>
					</div>
				</div>
              </div>
              
            </div>
          </div>

			<div class="footer-copyright blue-grey darken-3">
                <nav class="transparent z-depth-0">
                    <div class="nav-wrapper">
                        <ul class="right">
                        <li><a href="./index.php">Principal</a></li>
                        <li><a href="./publicacoes.php">Publicações</a></li>
                        <li><a href="./projetos.php">Projetos</a></li>
                        <li><a href="./contato.php">Contato</a></li>
                        </ul>
                    </div>
                </nav>
			</div>
        </footer>
        <?php
    }
?>