<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Carga arquivos da fábrica</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=<?= $_GET['pg'] ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="administracao.php?pg=<?= $_GET['pg'] ?>">Administração</a></li>
        <li class="breadcrumb-item"><a href="processos.php?pg=<?= $_GET['pg'] ?>&tela=<?= $GET['tela'] ?>">Processos fabrica VW</a></li>
        <li class="breadcrumb-item">Carga arquivos da fábrica</li>
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
            <h5 class="card-title" style="text-align: left;">LISTA ARQUIVOS FABRICA</h5>
            <div style="width:20%; margin-left: 76px;">
              <label for="inputDate" class="col-sm-6 col-form-label" style="margin-left: 0px;">Dia / Mês</label>
              <input type="date" class="form-control col-sm-3">
            </div>
            <hr style="opacity: 0;">
            <!-- Vertical Form -->
            <form>
              <div class="container col-lg-6" style="margin-left: 0px;">
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <label class="form-check-label" for="flexSwitchCheckDefault">MV</label>
                    <div class="form-check form-switch">
                      <input class="form-check-input"  type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Filial</label>
                    <input type="text" class="form-control"  disabled value="10" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Nome do arquivo:</label>
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="12" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="14" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="16" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="19" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="20" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="85" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="86" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="89" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="101" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="padding: 0rem 0rem;">
                  </div>
                </div>
                <div class="text-center py-5">
                <a href="http://10.100.1.214/unico/sistemas/sisrev/front/processos.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>"><button type="button" class="btn btn-primary">Voltar</button></a>
                <button type="reset" class="btn btn-secondary">Limpar Formulario</button>
                <button type="submit" class="btn btn-success">Enviar</button>
                </div>
              </div>
            </form>
            <!-- Vertical Form -->
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