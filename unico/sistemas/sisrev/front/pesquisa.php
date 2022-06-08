<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina

empty($_POST['pesquisa']) ? header('location: index.php') : '';

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Pesquisando por - <?=$_POST['pesquisa'] ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=<?= $_GET['pg'] ?>">Home</a></li>
        <li class="breadcrumb-item">Pesquisa</li>
      </ol>
    </nav>
  </div><!-- End Navegação -->

  <?php
  require_once('../../../inc/mensagens.php'); //Alertas
  ?>

  <!--################# COLE section AQUI #################-->

  <h6>Inicio da section!</h6>

  <!--################# section TERMINA AQUI #################-->

</main><!-- End #main -->

<?php
require_once('footer.php'); //Javascript e configurações afins
?>