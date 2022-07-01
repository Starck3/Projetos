<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina

if ($_GET['acao'] == 1) {


  //count
  $queryCount = "SELECT COUNT(id) AS quantidade FROM sisrev_atualizacao_preco_triumph";
  $resultCount = $conn->query($queryCount);
  $count = $resultCount->fetch_assoc();

  $displayAtualizaOne = 'none';
  $displayAtualizaTwo = 'block';

} else {

  $displayAtualizaOne = 'block';
  $displayAtualizaTwo = 'none';
}
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Atualizar preço peças</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="pecas.php">Peças</a></li>
        <li class="breadcrumb-item">Atualizar Preço Peças</li>
      </ol>
    </nav>
  </div><!-- End Navegação -->

  <?php
  require_once('../../../inc/mensagens.php'); //Alertas
  ?>

  <section class="section" style="display: <?= $displayAtualizaOne ?>;">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Escolha Empresa</h5>

            <!-- Default Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#trduc" type="button" role="tab" aria-controls="triumphDucati" aria-selected="true">Triumph / Ducati</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#honda" type="button" role="tab" aria-controls="honda" aria-selected="false">Honda</button>
              </li>
            </ul>
            <div class="tab-content pt-2" id="myTabContent">

              <!--triumph / ducati-->
              <div class="tab-pane fade active show" id="trduc" role="tabpanel" aria-labelledby="home-tab">
                <div class="row py-2 mb-3">
                  <div class="col-lg-10">
                    <div class="card">
                      <div class="card-body">
                        <form class="row g-3" action="../inc/atualizarPreco.php?pg=<?= $_GET['pg'] ?>" method="post" enctype="multipart/form-data">
                          <!--DADOS PARA O LANÇAMENTO -->
                          <h5 class="card-title">Atualizar preço peças</h5>
                          <div class="form-floating mb-3 col-md-5">
                            <select class="form-select" id="floatingSelect" name="empresa" required>
                              <option value="">-------------</option>
                              <option value="56">Ducati</option>
                              <option value="55">Triumph</option>
                            </select>
                            <label for="floatingSelect" class="capitalize">Selecione empresa</label>
                          </div>

                          <div class="form-floating mb-3 col-md-5">
                            <select class="form-select" id="floatingSelect" name="forcarPreco" required>
                              <option value="">-------------</option>
                              <option value="1">SIM</option>
                              <option value="2">NÂO</option>
                            </select>
                            <label for="floatingSelect" class="capitalize">Atualizar preço valor menor?</label>

                            <div id="ques" style="margin-left: 286px;margin-top: -42px;">
                              <a href="javascrpt:" data-bs-toggle="modal" data-bs-target="#questAtualizar">
                                <i class="bi bi-question-circle"></i>
                              </a>
                            </div>
                          </div>

                          <h5 class="card-title">Lista a atualizar!</h5>

                          <div class="row mb-3">
                            <div class="col-sm-10">
                              <input class="form-control" type="file" id="formFile" name="arquivo" required>
                              <code>Tipo de arquivo permitido[.xlsx]</code>
                            </div>
                          </div>

                          <!-- BOTÃO DO FORMULARIOS -->
                          <div class="text-left  mb-3">
                            <hr>
                            <button type="reset" class="btn btn-secondary">Limpar Formulario</button>
                            <button type="submit" class="btn btn-success">Ler lista de peças</button>
                          </div>
                        </form><!-- FIM Form -->
                      </div><!-- FIM card-body -->
                    </div><!-- FIM card -->
                  </div><!-- FIM col-lg-12 -->
                </div>
              </div>

              <!--HONDA-->
              <div class="tab-pane fade" id="honda" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row py-2 mb-3">
                  <div class="col-lg-10">
                    <div class="card">
                      <div class="card-body">

                        <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                          <!--DADOS PARA O LANÇAMENTO -->
                          <h5 class="card-title">Atualizar preço peças</h5>

                          <div class="col-sm-8">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Data histórico a retornar</span>
                              <input type="date" class="form-control" aria-label="dateHistorico" aria-describedby="basic-addon1">
                            </div>
                          </div>

                          <h5 class="card-title">Como devemos continuar!</h5>

                          <fieldset class="row mb-3">
                            <div class="col-sm-10">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option1" checked>
                                <label class="form-check-label" for="gridRadios3">
                                  Atualizar e Gerar Relatório
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option2">
                                <label class="form-check-label" for="gridRadios4">
                                  Apenas Gerar Relatório
                                </label>
                              </div>
                            </div>
                          </fieldset>
                          <!-- BOTÃO DO FORMULARIOS -->
                          <div class="text-left  mb-3">
                            <hr>
                            <button type="reset" class="btn btn-secondary">Limpar Formulario</button>
                            <button type="submit" class="btn btn-success">Continuar</button>
                          </div>
                        </form><!-- FIM Form -->
                      </div><!-- FIM card-body -->
                    </div><!-- FIM card -->
                  </div><!-- FIM col-lg-12 -->
                </div>
              </div>
            </div><!-- End Default Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="section" style="display: <?= $displayAtualizaTwo ?>;">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Peças encontradas - TRIUMPH</h5>
            <p>No arquivo foram encontradas <code><?= $count['quantidade']?></code> peças.</p>
            <p>Agora se você deseja continuar para a atualização basta clicar em <code>"PROSSEGUIR"</code>, caso contrario pode imprir esse relatório</p>

            <!-- Table with stripped rows -->
            <form action="" method="post" class="row g-3">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col" class="capitalize">codigo item</th>
                    <th scope="col" class="capitalize">descrição</th>
                    <th scope="col" class="capitalize">valor</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryListaPreco = "SELECT item, descricao, rrp as valor FROM sisrev_atualizacao_preco_triumph";
                  $resultListaPreco = $conn->query($queryListaPreco);
                  
                  while($listaPreco = $resultListaPreco->fetch_assoc()){
                      echo '<tr>
                              <td>'.$listaPreco['item'].'</td>
                              <td>'.$listaPreco['descricao'].'</td>
                              <td>R$ '.$listaPreco['valor'].'</td>
                          </tr>';
                  }
                  ?>
                </tbody>
              </table>


              <!-- BOTÃO DO FORMULARIOS -->
              <div class="text-left  mb-3">
                <hr>
                <a href="../inc/pdfTabelaPrecos.php?pg=<?=$_GET['pg']?>&pdf=1" class="btn btn-info">Imprimir relatório</a>
                <button type="submit" class="btn btn-success">Prosseguir</button>
              </div>
            </form>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<div class="modal fade" id="questAtualizar" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atualizar preço peças - O QUE QUER DIZER ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="bi bi-pin-angle"></i> Marcou <code>"SIM"</code>, então o sistema <b>irá atualizar todos os preços</b> do APOLLO indiferente se o valor que esta no arquivo é menor do que está no APOLLO</p>
        <p><i class="bi bi-pin-angle"></i> Marcou <code>"NÂO"</code>, o sistema <b>não irá atualizar os preços</b> de peça que for menor do que está no APOLLO.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div><!-- End Large Modal-->
<?php
require_once('footer.php'); //Javascript e configurações afins
?>