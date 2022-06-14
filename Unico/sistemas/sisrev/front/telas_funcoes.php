<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Cadastro de telas e funções</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=<?= $_GET['pg'] ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="configuracao.php">Configurações</a></li>
        <li class="breadcrumb-item">Telas e Funções</li>
      </ol>
    </nav>
  </div><!-- End Navegação -->

  <?php
  require_once('../../../inc/mensagens.php'); //Alertas
  ?>

  <!--################# COLE section AQUI #################-->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title"></h5>
      <!-- Default Tabs -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="telas-tab" data-bs-toggle="tab" data-bs-target="#telas" type="button" role="tab" aria-controls="telas" aria-selected="true">Telas</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="funcoes-tab" data-bs-toggle="tab" data-bs-target="#funcoes" type="button" role="tab" aria-controls="funcoes" aria-selected="false">Funções</button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="myTabContent">
        <div class="tab-pane fade show active" id="telas" role="tabpanel" aria-labelledby="telas-tab">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Cadastrar Telas
                    <a href="acessos_alterar.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>&acao=1" class="btn btn-success button-rigth-card" title="Nova tela">
                      <i class="bi bi-plus"></i>
                    </a>
                  </h5>
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      //chamando acessos
                      $queryAcessos .= " WHERE deletar = 0";
                      $resultado = $conn->query($queryAcessos);

                      while ($acessos = $resultado->fetch_assoc()) {
                        echo '
                        <tr>
                          <th scope="row">' . $acessos['id'] . '</th>
                          <td>' . $acessos['nome'] . '</td>
                          <td>' . $acessos['endereco'] . '</td>
                          <td> 
                            <a href="acessos_alterar.php?pg=' . $_GET['pg'] . '&tela=' . $_GET['tela'] . '&id=' . $acessos['id'] . '&acao=2" title="Editar" class="btn btn-primary btn-sm">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <a href="#" title="Excluir" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal' . $acessos['id'] . '">
                              <i class="bi bi-trash"></i>
                            </a>
                          </td>
                        </tr>

                        <!-- Inicio do Modal de desativar -->
                        <div class="modal fade" id="basicModal' . $acessos['id'] . '" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Excluir Acessos Rápidos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="#" method="post">
                                <div class="row mb-3" style="margin-top: 13px;">
                                  <label for="nome" class="col-md-4 col-lg-3 col-form-label" style="margin-left: 12px;">Nome:</label>
                                  <div class="col-md-7 col-lg-8">
                                    <input name="nome" type="text" class="form-control" id="nome" value="' . $acessos['nome'] . '" disabled>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="endereco" class="col-md-4 col-lg-3 col-form-label" style="margin-left: 12px;">Endereço:</label>
                                  <div class="col-md-7 col-lg-8">
                                    <input name="endereco" type="endereco" class="form-control" id="endereco" value="' . $acessos['endereco'] . '" disabled>
                                  </div>
                                </div>
                              </form>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <a href="../inc/acessos_alterar.php?pg=' . $_GET['pg'] . '&tela=' . $_GET['tela'] . '&acao=3&id=' . $acessos['id'] . '" title="Excluir" class="btn btn-danger">Deletar</a>
                              </div>
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
        </div>
        <div class="tab-pane fade" id="funcoes_tab" role="tabpanel" aria-labelledby="funcoes-tab">
          <div class="tab-pane fade show active" id="funcoes" role="tabpanel" aria-labelledby="funcoes-tab">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Cadastrar Funções
                      <a href="#" class="btn btn-success button-rigth-card" title="Nova função" data-bs-toggle="modal" data-bs-target="#novaFuncaoModal">
                        <i class="bi bi-plus"></i>
                      </a>
                    </h5>
                    <!-- Inicio do Modal de nova Função -->
                    <div class="modal fade" id="novaFuncaoModal" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Criar nova Função</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="../inc/telas_funcoes.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>&acao=1" method="post">
                            <div class="row mb-3" style="margin-top: 13px;">
                              <label for="descricao" class="col-md-4 col-lg-3 col-form-label" style="margin-left: 12px;">Descrição:</label>
                              <div class="col-md-7 col-lg-8">
                                <input name="descricao" type="text" class="form-control" id="descricao" value="" required>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="tela" class="col-md-4 col-lg-3 col-form-label" style="margin-left: 12px;">Tela:</label>
                              <div class="col-md-7 col-lg-8">
                                <select id="tela" name="tela" class="form-select" required>
                                  <option value =''>Escolha...</option>
                                  <?php
                                    $resultModulos = $conn->query($queryModulos);
                                    while ($rowModulos = $resultModulos->fetch_assoc()) {
                                      echo'<option value='.$rowModulos['id'].'>'.$rowModulos['nome'].'</option>';
                                    }                                  
                                  ?>                                  
                                </select>                                
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
                        <!-- Fim do Modal-->
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th scope="col">ID &nbsp;&nbsp;</th>
                          <th scope="col">Tela da Função</th>
                          <th scope="col">Descrição</th>
                          <th scope="col">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $resultadoFuncoes = $conn->query($queryFuncaoModulos);
                          while ($rowFuncoes = $resultadoFuncoes->fetch_assoc()) {
                            echo' 
                              <tr>
                              <th scope="row">' .$rowFuncoes['id_funcao']. '</th>
                              <td>' .$rowFuncoes['nome']. '</td>
                              <td>' .$rowFuncoes['descricao']. '</td>
                              <td> 
                                <a href="#" title="Editar" class="btn btn-primary btn-sm">
                                  <i class="bi bi-pencil"></i>
                                </a>
                                <a href="#" title="Excluir" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#' . $acessos['id'] . '">
                                  <i class="bi bi-trash"></i>
                                </a>
                              </td>
                            </tr>';
                          }                          
                        ?>
                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Default Tabs -->
    </div>
  </div>



  <!--################# section TERMINA AQUI #################-->

</main><!-- End #main -->

<?php
require_once('footer.php'); //Javascript e configurações afins
?>