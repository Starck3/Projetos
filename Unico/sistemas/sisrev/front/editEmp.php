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
  require_once('../../../inc/mensagens.php'); //Alertas
  ?>

  <!--################# COLE section AQUI #################-->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <form class="row g-3" action="" method="post" enctype="multipart/form-data">
              <!--DADOS PARA O LANÇAMENTO -->
              <div class="form-floating mt-4 col-md-12">
                <select class="form-select" id="floatingSelect" name="usuarioBPM" disabled>
                  <option value="1">Felipe Lara</option>
                  <option value="2">Lucimara</option>
                  <option value="3">Suellem</option>
                </select>
                <label for="floatingSelect" class="capitalize">EMPRESA:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <select class="form-select" id="floatingSelect" name="fornecedor" required>
                  <option value="">-----------------</option>
                  <option value="2">APOLLO</option>
                  <option value="3">APOLLO NBS</option>
                  <option value="4">BANCO HARLEY</option>
                  <option value="5">EMPRESA QUE NÃO USA SISTEMA ERP</option>
                </select>
                <label for="floatingSelect">SISTEMA:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <input class="form-control" id="floatingSelect" name="filial" maxlength="2" required>
                <label for="floatingSelect">EMPRESA APOLLO:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
              <input class="form-control" id="floatingSelect" name="filial" maxlength="2" required>
                <label for="floatingSelect">REVENDA APOLLO:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
              <input class="form-control" id="floatingSelect" name="filial" maxlength="2" required>
                <label for="floatingSelect">ORGANOGRAMA SENIOR:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <input class="form-control" id="floatingSelect" name="filial" maxlength="2" required>
                <label for="floatingSelect">EMPRESA SENIOR:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
              <input class="form-control" id="floatingSelect" name="filial" maxlength="2" required>
                <label for="floatingSelect">FILIAL SENIOR:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <select class="form-select" id="floatingSelect" name="fornecedor" required>
                  <option value="">-----------------</option>
                  <option value="2">SIM</option>
                  <option value="3">NÃO</option>
                </select>
                <label for="floatingSelect">CONSÓRCIO:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <select class="form-select" id="floatingSelect" name="filial" required>
                  <option value="">-----------------</option>
                  <option value="2">ATIVO</option>
                  <option value="3">DESATIVADO</option>
                </select>
                <label for="floatingSelect">SITUAÇÃO:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <select class="form-select" id="floatingSelect" name="fornecedor" required>
                <option value="">------------</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                    <option value="EX">EX</option>
                </select>
                <label for="floatingSelect">UF:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <select class="form-select" id="floatingSelect" name="filial" required>
                  <?php 
                  require_once('../inc/apiRecebeSelbetti.php');
                  echo $aprovador;
                  ?>
                </select>
                <label for="floatingSelect">NÚMERO CAIXA:</label>
              </div>
              <div class="text-center py-2">
                <button type="reset" class="btn btn-secondary">Limpar Formulario</button>
                <button type="submit" class="btn btn-success">Salvar</button>
              </div>
            </form><!-- FIM Form -->
          </div><!-- FIM card-body -->
        </div><!-- FIM card -->
      </div><!-- FIM col-lg-12 -->
  </section><!-- FIM section -->
  <!--################# section TERMINA AQUI #################-->

</main><!-- End #main -->

<?php
require_once('footer.php'); //Javascript e configurações afins
?>