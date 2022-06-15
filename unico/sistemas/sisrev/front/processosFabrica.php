<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>PROCESSOS FABRICA VW</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=<?= $_GET['pg'] ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="administracao.php?pg=<?= $_GET['pg'] ?>">Administração</a></li>
        <li class="breadcrumb-item">Processos fabrica VW</li>
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
            <h5 class="card-title" style="text-align: center;">LISTA ARQUIVOS FABRICA</h5>
            <div class="col-3" style="margin: auto;">
              <label for="inputDate" class="col-sm-6 col-form-label">Dia / Mês</label>
                  <input type="date" class="form-control col-sm-3">
            </div><br>
                <!-- Vertical Form -->
            <form class="row col-9" style="margin:auto;">
              <div class="col-1">
              <label for="inputNanme4" class="form-label">MV</label><br>
              <input class="form-check-input mb-2" type="checkbox" id="gridCheck1"><br>
              <input class="form-check-input mb-2" type="checkbox" id="gridCheck1"><br>
              <input class="form-check-input mb-2" type="checkbox" id="gridCheck1"><br>
              <input class="form-check-input mb-2" type="checkbox" id="gridCheck1"><br>
              <input class="form-check-input mb-2" type="checkbox" id="gridCheck1"><br>
              <input class="form-check-input mb-2" type="checkbox" id="gridCheck1"><br>
              <input class="form-check-input mb-2" type="checkbox" id="gridCheck1"><br>
              <input class="form-check-input mb-2" type="checkbox" id="gridCheck1"><br>

              </div>
              <div class="col-2">
              <label for="inputNanme4" class="form-label">Filial</label><br>
              <input type="text" class="form-control mb-2" value="10" disabled="">
              <input type="text" class="form-control mb-2" value="12" disabled="">
              <input type="text" class="form-control mb-2" value="14" disabled="">
              <input type="text" class="form-control mb-2" value="16" disabled="">
              <input type="text" class="form-control mb-2" value="19" disabled="">
              <input type="text" class="form-control mb-2" value="20" disabled="">
              <input type="text" class="form-control mb-2" value="85" disabled="">
              <input type="text" class="form-control mb-2" value="89" disabled="">
              <input type="text" class="form-control mb-2" value="101" disabled="">

              </div>
              <br>
              <div class="col-4">
                <label for="inputNanme4" class="form-label">Nome do arquivo</label><br>
                <input type="text" class="form-control mb-2" id="inputNanme4">
                <input type="text" class="form-control mb-2" id="inputNanme4">
                <input type="text" class="form-control mb-2" id="inputNanme4">
                <input type="text" class="form-control mb-2" id="inputNanme4">
                <input type="text" class="form-control mb-2" id="inputNanme4">
                <input type="text" class="form-control mb-2" id="inputNanme4">
                <input type="text" class="form-control mb-2" id="inputNanme4">
                <input type="text" class="form-control mb-2" id="inputNanme4">
                <input type="text" class="form-control mb-2" id="inputNanme4">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- Vertical Form -->
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