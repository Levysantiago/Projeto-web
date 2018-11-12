<?php

    /* FUNÇÃO PARA IMPRIMIR NAVBAR */
    function printNavBar(){
        ?>
        <nav class="blue-grey darken-3">
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="left">
                <li><a href="admPublicacoes.php">Publicações</a></li>
                <li><a href="admProjetos.php">Projetos</a></li>
                </ul>
            </div>
        </nav>
        <?php
    }
?>

<?php     
    /* FORMULÁRIO DE CADASTRO DE PUBLICAÇÃO */
    function printFormCadastroPublicacao($titulo_error, $evento_error, $cidade_error, 
        $anais_error, $paginas_error, $ano_error, $link_error, $row, $form){
?>
    <!-- CARD DE CADASTRO PUBLICAÇÃO -->
    <div class="row">
        <div class="col s12">
            <div class="card white">
            <div class="card-content">
                <span class="card-title">Adicionar nova publicação</span>
                <div class="row">
                <form name="form" class="col s12" action="" method="POST" onsubmit="return validaFormPublicacoes(this);">

                    <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="titulo" name="titulo" placeholder="Ex.: Aplicando Internet das Coisas na medicina"
                        class="validate truncate" value="<?php echo $row['titulo'] ?>">
                        <label for="titulo">Título *</label>
                        <?php echo "<span class=\"helper-text red-text\" data-error=\"Título é obrigadório\">$titulo_error</span>" ?>
                    </div>
                    </div>

                    <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" id="evento" name="evento" placeholder="Ex.: VI Congresso Brasileiro de Informática" 
                            class="validate truncate" value="<?php echo $row['evento'] ?>">
                        <label for="evento">Evento/Congresso *</label>
                        <?php echo "<span class=\"helper-text red-text\" data-error=\"Evento/Congresso é obrigadório\">$evento_error</span>" ?>
                    </div>

                    <div class="input-field col m6">
                        <input type="text" id="cidade" name="cidade" placeholder="Ex.: Itabuna" class="validate"
                            value="<?php echo $row['cidade'] ?>">
                        <label for="cidade">Cidade *</label>
                        <?php echo "<span class=\"helper-text red-text\" data-error=\"Cidade é obrigadório\">$cidade_error</span>" ?>
                    </div>
                    </div>

                    <div class="row">
                    <div class="input-field col s12 m9">
                        <input type="text" id="anais" name="anais" placeholder="Ex.: Anais dos Workshops do Congresso Brasileiro de Informática"
                        class="truncate" value="<?php echo $row['anais'] ?>">
                        <label for="anais">Anais da publicação</label>
                        <?php echo "<span class=\"helper-text red-text\">$anais_error</span>" ?>
                    </div>

                    <div class="input-field col m3">
                        <input type="text" id="paginas" name="paginas" placeholder="Ex.: p. 962-971" value="<?php echo $row['paginas'] ?>">
                        <label for="paginas">Páginas</label>
                        <?php echo "<span class=\"helper-text red-text\">$paginas_error</span>" ?>
                    </div>
                    </div>

                    <div class="row">
                    <div class="input-field col m6">
                        <input type="text" id="ano" name="ano" placeholder="Ex.: 2017" class="validate" value="<?php echo $row['ano'] ?>">
                        <label for="ano">Ano da publicação *</label>
                        <?php echo "<span class=\"helper-text red-text\" data-error=\"Ano é obrigadório\">$ano_error</span>" ?>
                    </div>

                    <div class="input-field col s12 m6">
                        <input type="text" id="link" name="link" placeholder="Ex.: http://exemplo.com/anais" class="validate"
                            value="<?php echo $row['link'] ?>">
                        <label for="link">Link *</label>
                        <?php echo "<span class=\"helper-text red-text\" data-error=\"Link é obrigadório\">$link_error</span>" ?>
                    </div>
                    </div>

                    <div class="card-action">
                    <div class="row">
                        <?php 
                        if(isset($form['hid'])){
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
    <!-- / CARD DE CADASTRO PUBLICAÇÃO -->
<?php 
    }

    function printFormCadastroProjeto($titulo_error, $descricao_error, $link_error, $row, $form){
        ?>
        <!-- CARD DE CADASTRO PROJETOS -->
        <div class="row">
            <div class="col s12">
            <div class="card white">
                <div class="card-content">
                <span class="card-title">Adicionar novo projeto</span>
                <div class="row">
                    <form name="form" class="col s12" action="" method="POST" onsubmit="return validaFormProjetos(this)">

                    <div class="row">
                        <div class="input-field col s12">
                        <input type="text" id="titulo" name="titulo" placeholder="Ex.: Meu Projeto" class="validate" value="<?php echo($row['titulo']); ?>" maxlength="120">
                        <label for="titulo">Título *</label>
                        <?php echo "<span class=\"helper-text red-text\" data-error=\"Título é obrigadório\">$titulo_error</span>" ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                        <textarea id="descricao" name="descricao" placeholder="Ex.: Este projeto tem como objetivo..." class="materialize-textarea truncate"
                            data-length="400"><?php echo($row['descricao']); ?></textarea>
                        <label for="descricao">Descrição *</label>
                        <?php echo "<span class=\"helper-text red-text\" data-error=\"Descrição é obrigatória\">$descricao_error</span>" ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                        <input type="text" id="link" name="link" placeholder="Ex.: http://meuprojeto.com" class="validate" value="<?php echo($row['link']); ?>" maxlength="255">
                        <label for="link">Link para conteúdo/página *</label>
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
        <?php
    }
?>


<?php
    /* CARD DE PUBLICAÇÃO CADASTRADA */
    function printPublicacoes($id, $titulo, $evento, $cidade, $anais, $paginas, $ano, $link){
?>
        <!-- CARD DE PUBLICAÇÕES CADASTRADAS-->
        <div>
            <div class="row">
            <div class="col s12">
                <div class="card white hoverable">
                <div class="card-content white">
                    <span class="card-title activator grey-text text-darken-4"><?php echo $titulo ?>
                    <i class="material-icons right">more_vert</i>
                    </span>
                    <p><b>Local:</b> <?php echo $evento . ", " . $cidade ?></p>
                    <p><b>Ano:</b> <?php echo $ano ?></p>
                    <?php //Verificando se existem anais a serem mostrados
                    if(!empty($anais) && !empty($paginas)){
                        echo "<p><b>Em:</b> $anais,  $paginas</p>";
                    } ?>
                </div>
                <div class="card-action">
                    <a href="<?php echo $link ?>">Link Anais</a>
                </div>
                <div class="card-reveal blue-grey darken-3">
                    <span class="card-title white-text text-darken-4 truncate"><?php echo $titulo ?>
                    <i class="material-icons right">close</i>
                    </span>

                    <div class="row action">
                        <a class="waves-effect waves-light btn blue darken-2 col s6 offset-s3" href="admPublicacoes.php?hid=<?php echo $id?>&submit=editar">editar</a>
                    </div>
                    <div class="row">
                        <form name="formDelete" action="admPublicacoes.php" method="GET" onsubmit="return confirmDelete('Você tem certeza que quer deletar esta publicação?');">
                            <input name="id" value="<?php echo $id ?>" type="hidden">
                            <button class="waves-effect waves-light btn red darken-4 col s4 offset-s4" type="submit" name="submit" value="excluir">excluir</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- / CARD DE PUBLICAÇÕES CADASTRADAS-->
<?php
    }
?>

<?php
    function printProjetos($id, $titulo, $descricao, $link){
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
                <div class="card-action">
                    <a href="<?php echo $link ?>">Link</a>
                </div>
                <div class="card-reveal blue-grey darken-3">
                <span class="card-title white-text text-darken-4 truncate"><?php echo $titulo ?>
                    <i class="material-icons right">close</i>
                </span>

                <div class="row action">
                    <a class="waves-effect waves-light btn blue darken-2 col s6 offset-s3" href="admProjetos.php?hid=<?php echo $id?>&submit=editar">editar</a>
                </div>
                <div class="row">
                    <form name="formDelete" action="admProjetos.php" method="GET" onsubmit="return confirmDelete('Você tem certeza que quer deletar este projeto?');">
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
?>

<?php

    function printFooter(){
        ?>
        <!-- FOOTER -->
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
        <?php
    
    }
?>