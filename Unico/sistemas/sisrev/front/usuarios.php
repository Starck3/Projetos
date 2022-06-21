<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Usuários</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=<?= $_GET['pg'] ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="configuracao.php?pg=<?= $_GET['pg'] ?>">Configurações</a></li>
        <li class="breadcrumb-item">Usuários</li>
      </ol>
    </nav>
  </div><!-- End Navegação -->

  <?php
  require_once('../../../inc/mensagens.php'); //Alertas
  ?>

  <!--################# COLE section AQUI #################-->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edição de usuários para o Sisrev</h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Usuário</th>
                  <th scope="col">Ação</th>
                </tr>
              </thead>
              <tbody>
                <?php
                //chamando usuários                
                $queryUsers .= " WHERE deletar = 0 ORDER BY NOME ASC";
                $resultado = $conn->query($queryUsers);

                //chamando as funções
                $resultadoFuncoes = $conn->query($queryFuncoes);

                while ($usuarios = $resultado->fetch_assoc()) {
                  echo '
                    <tr>
                      <th scope="row">' . $usuarios['id_usuario'] . '</th>
                      <td>' . $usuarios['nome'] . '</td>
                      <td>' . $usuarios['usuario'] . '</td>
                      <td> 
                        <a href="usuarioSisrev.php?pg='.$_GET['pg'].'tela='.$_GET['tela'].'" title="Editar Usuário" class="btn btn-primary btn-sm">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <a href="#" title="Permissões" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal'.$usuarios['id_usuario'].'">
                          <i class="bx bxs-lock-open"></i>
                      </a>
                      </td>
                    </tr>
                    
                    <!-- Inicio do Modal de Editar -->
                    <div class="modal fade" id="editarModal'.$usuarios['id_usuario'].'" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar função:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="../inc/telas_funcoes.php?pg=' . $_GET['pg'] . '&tela=' . $_GET['tela'] . '&acao=4&id=' . $usuarios['id_usuario'] . '" method="post">                                          
                                  <div class="card">
                                    <div class="card-body">
                                      <h5 class="card-title">Selecione a função que deseja cadastrar / editar</h5>                        
                                      <!-- List group With Checkboxes and radios -->
                                      <ul class="list-group">';
                                      while ($funcoes = $resultadoFuncoes->fetch_assoc()) {
                                        echo'
                                        <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" name="descricao" id="descricao" value="'.$funcoes['id_funcao'].'">
                                          '.$funcoes['descricao'].'
                                        </li>';
                                      }
                                      echo'                                        
                                      </ul>
                                      <!-- End List Checkboxes and radios -->                        
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                      <button type="submit" class="btn btn-success">Salvar</a>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Fim do Modal-->';
                  }
                ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

  <!--################# section TERMINA AQUI #################-->

</main><!-- End #main -->

<?php
require_once('footer.php'); //Javascript e configurações afins
?>