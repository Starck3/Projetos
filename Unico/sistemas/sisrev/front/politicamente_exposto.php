<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Politicamente Exposto</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="informatica.php">Informática</a></li>
        <li class="breadcrumb-item">Politicamente exposto</li>
      </ol>
    </nav>
  </div><!-- End Navegação -->

  <?php
  require_once('../../../inc/mensagens.php'); //Alertas
  ?>
  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Carregar arquivo</h5>
            <!-- General Form Elements -->
            <div class="header d-flex align-items-center header-scrolled">
              <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="post" action="../inc/politicamente_exposto.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>" enctype="multipart/form-data">
                  <input type="file" name="arquivo" placeholder="Insira Documento" required>
                  <button type="submit" title="Enviar" class="btn btn-success"><i class="bi bi-send"></i></button>
                </form>
              </div>
            </div>
            <!-- End General Form Elements -->
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Log de execução - Ultima vez</h5>
            <!-- List group with active and disabled items -->
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><code>Autor:</code> <?=$logPE['nome']?></li>
              <li class="list-group-item"><code>Data:</code>  <?= date('d/m/Y H:i:s', strtotime($logPE['data'])) ?></li>
              <li class="list-group-item"><code>Arquivo:</code>  <a href="../<?=substr($logPE['caminho'], 36)?>" target="_blank" rel="file CSV"><?=$logPE['nome_arquivo']?></a></li>
            </ul><!-- End Clean list group -->

          </div>
        </div>
      </div>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-triangle me-1"></i>
      Tipo de arquivos permitidos[.csv]
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </section>

</main><!-- End #main -->

<?php
require_once('footer.php'); //Javascript e configurações afins
?>