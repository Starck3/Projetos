<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php');
require_once('../config/query.php'); //menu lateral da pagina
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Etiqueta Laser</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=<?= $_GET['pg'] ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="pecas.php?pg=<?= $_GET['pg'] ?>">Peças</a></li>
        <li class="breadcrumb-item">Etiqueta Laser</li>
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
            <br>
            <!-- Vertical Form -->
            <form class="row g-3" method="POST" action="<?= $PHP_SELF ?>">
              <div class="col-3">
                <label for="revEmp" class="form-label">Rev Empresa</label>
                <input type="text" class="form-control" id="revEmp" name="revEmp">
              </div>
              <div class="col-3">
                <label for="numeroNota" class="form-label">Nº Nota</label>
                <input type="text" class="form-control" id="numeroNota" name="numeroNota">
              </div>
              <div class="col-3">
                <label for="numeroCaixa" class="form-label">Caixa</label>
                <input type="text" class="form-control" id="numeroCaixa" name="numeroCaixa">
              </div>
              <div class="col-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="data">
                
              </div>
              <div class="text-left py-3">
                <button type="submit" value="1" name="der" class="btn btn-primary">Pesquisar</button>
              </div>
            </form>
            <section class="section">
                <div class="row">
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col" class="capitalize">DATA NF</th>
                        <th scope="col" class="capitalize">Nº NF</th>
                        <th scope="col" class="capitalize">PRODUTO</th>
                        <th scope="col" class="capitalize">CAIXA</th>
                        <th scope="col" class="capitalize">QTDE</th>
                        <th scope="col" class="capitalize">TOT ITEM</th>
                        <th scope="col" class="capitalize">VAL IPI</th>
                        <th scope="col" class="capitalize">SEQ</th>
                        <th scope="col" class="capitalize">FORNEC</th>
                      </tr>
                    </thead>

                    <?php 
                      $revEmp = $_POST['revEmp'];
                      $numeroCaixa = $_POST['numeroCaixa'];
                      $numeroNota = $_POST['numeroNota'];
                      $data = $_POST['data'];
                      
                      switch($_POST['der'] == 1){
                          case $dataBr:
                            $buscaCarga.= " WHERE data_nota = ".$dataBr."";
                            break;
                          case $numeroNota:
                            $buscaCarga.= " WHERE numero_nota = ".$numeroNota."";
                            break;
                          case $numeroCaixa:
                            $buscaCarga.= " WHERE caixa = ".$numeroCaixa."";
                            break;
                          case $revEmp:
                            $buscaCarga.= " WHERE rev_emp = ".$revEmp."";
                            break;
                      }
                      $conSucesso = $conn->query($buscaCarga);
                      
                      while($row = $conSucesso->fetch_assoc()){

                        $dataTab = $row['data_nota'];
                        $dataTab = implode('/', array_reverse(explode('-', $dataTab)));
                        
                        echo '<tr>
                              <th>'.$dataTab.'</th>
                              <th>'.$row['numero_nota'].'</th>
                              <th>'.$row['produto'].'</th>
                              <th>'.$row['caixa'].'</th>
                              <th>'.$row['qtde'].'</th>
                              <th>'.$row['tot_item'].'</th>
                              <th>'.$row['val_ipi'].'</th>
                              <th>'.$row['seq'].'</th>
                              <th>'.$row['fornecedor'].'</th>
                              </tr>'
                              ;
                      }
                    ?>
                  </table>
                  <!-- End Table with stripped rows -->
                </div>
              </section>
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