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
  </div>
  <!-- End Navegação -->

  <?php
  require_once('../../../inc/mensagens.php'); //Alertas
  ?>

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

                //while dos usuários 
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
                        <button type="button" title="Permissões" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal'.$usuarios['id_usuario'].'">
                          <i class="bx bxs-lock-open"></i>
                        </button>
                      </td>
                    </tr>

                    <!-- Modal Dialog Scrollable -->              
                    <div class="modal fade" id="editarModal'.$usuarios['id_usuario'].'" tabindex="-1">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Editar função:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">

                          <form action="../inc/telas_funcoes.php?pg=' . $_GET['pg'] . '&tela=' . $_GET['tela'] . '&acao=4&id=' . $usuarios['id_usuario'] . '" method="post"> 
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Selecione a tela e a função</h5>';

                                //chamando todas as telas
                                $queryAcessos = "SELECT * FROM sisrev_modulos WHERE deletar = 0";    
                                $resultTelas = $conn->query($queryAcessos);

                                //while telas
                                while ($rowTelas = $resultTelas->fetch_assoc()) {

                                  //chamando as funções por telas
                                  $queryFuncoes = "SELECT * FROM sisrev_funcao WHERE id_modulos = '".$rowTelas['id']."'";
                                  $resultFuncao = $conn->query($queryFuncoes);

                                  while ($rowFuncao = $resultFuncao->fetch_assoc()) {
                                    echo'
                                  <!-- Inicio Accordion Função -->
                                  <div class="accordion" id="accordionExample'.$usuarios['id_usuario'].'">
                                    <div class="accordion-item">
                                      <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne'.$rowTelas['id'].'" aria-expanded="false" aria-controls="collapseOne">
                                          '.$rowTelas['nome'].'
                                        </button>
                                      </h2>
                                      <div id="collapseOne'.$rowTelas['id'].'" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">';
                                          //aplicando query de funções no banco
                                          $queryFuncoesTelas = "SELECT * FROM sisrev_funcao WHERE id_modulos = ".$rowTelas['id']."";
                                          $resultFuncaoTelas = $conn->query($queryFuncoesTelas);

                                          //Inicio do While das funções
                                          while ($rowFuncoes = $resultFuncaoTelas->fetch_assoc()) {

                                            //Buscando as funções por usuário
                                            $queryUserFuncao = "SELECT * FROM sisrev_usuario_funcao WHERE id_usuario = '".$usuarios['id_usuario']."' AND id_funcao = '".$rowFuncoes['id_funcao']."'";
                                            $resultUserFuncao = $conn->query($queryUserFuncao);
                                            $rowFuncaoUsuario = $resultUserFuncao->fetch_assoc();                                             
                                            $checked = $rowFuncaoUsuario['id_funcao'] != NULL ? 'checked' : '';
                                            echo'
                                            <ul class="list-group">
                                              <li class="list-group-item">
                                                <input class="form-check-input me-1" type="checkbox" name="funcao[]" value="'.$rowFuncoes['id_funcao'].'" '.$checked.'>
                                                  '.$rowFuncoes['nome'].' - '.$rowFuncoes['descricao'].'
                                              </li>
                                            </ul>';
                                          } echo'
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Fim Accordion Função --> ';                                     
                                  }                                  
                                } echo'
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                              <button type="submit" class="btn btn-success">Salvar</button>
                          </div>
                          </form>
                          
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!-- End Modal Dialog Scrollable-->';
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