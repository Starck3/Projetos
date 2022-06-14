<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina
require_once('../inc/apiRecebeTabela.php');
?>

<main id="main" class="main">
<style>
.div-table{ display:table; width: auto; margin-left: 87px;}
.div-table-row{display:table-row;width: auto;  /*se quiser pode colocar auto neste também*/}
.div-table-col{border: 0px solid #484848;display:table-cell;padding: 8px; font-size: 13px;}
</style>
  <div class="pagetitle">
    <h1>Empresas</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=<?= $_GET['pg'] ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="informatica.php?pg=<?= $_GET['pg'] ?>">Informática</a></li>
        <li class="breadcrumb-item">Empresas</li>
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
          <div class="card-header">
            <a href="novaRegraEmp.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>" type="button" class="btn btn-success" style="float: right; margin-left: 8px;" title="Nova regra empresa"><i class="bx bxs-file-plus"></i></a>

            <a href="../bd/relatorioExcel.php" type="button" class="btn btn-success" style="float: right;" title="Exportar excel"><i class="ri-file-excel-2-fill"></i></A>
          </div>
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" class="capitalize">#</th>
                  <th scope="col" class="capitalize">EMPRESA</th>
                  <th scope="col" class="capitalize">UF</th>
                  <th scope="col" class="capitalize">SISTEMA</th>
                  <th scope="col" class="capitalize">CONSÓRCIO</th>
                  <th scope="col" class="capitalize">SITUAÇÃO</th>
                  <th scope="col" class="capitalize">AÇÃO</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                require_once('../inc/inserindoTabela.php');
                ?>
              </tbody>
            </table>
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