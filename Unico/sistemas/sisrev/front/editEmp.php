<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Editar Regra Empresa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=1">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="informatica.php?pg=<?= $_GET['pg'] ?>">Informática</a></li>
        <li class="breadcrumb-item"><a href="empresas.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>">Empresa</a></li>
        <li class="breadcrumb-item">Editar Regra Empresa</li>
      </ol>
    </nav>
  </div><!-- End Navegação -->

    <?php
    require_once('../../../inc/mensagens.php'); 
    
    ?>
    <?php 
    require_once('../inc/editemp.php');
    ?>
  
  <!-- FIM section -->
  <!--################# section TERMINA AQUI #################-->

