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
  <?php
  require_once('../inc/apiRecebeSmart.php');

  ?>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            <!-- General Form Elements -->
            <form>
              <div class="row mb-3 mt-4">
                <label for="inputText" class="col-sm-2 col-form-label">EMPRESA:<span style="color: red;" title="Campo obrigatório">*</span></label>
                <div class="col-lg-5">
                <input type="text" class="form-control" maxlength="2" disabled>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">SISTEMA:<span style="color: red;" title="Campo obrigatório">*</span></label>
                <div class="col-lg-5">
                <select type="text" class="form-control" require>
                    <option>------------</option>
                    <option>APOLLO BNS</option>
                    <option>BANCO HARLEY</option>
                    <option>EMPRESA QUE NAO USA SISTEMA ERP</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">EMPRESA APOLLO:<span style="color: red;" title="Campo obrigatório">*</span></label>
                <div class="col-lg-5">
                  <input type="text" class="form-control" maxlength="2" require>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">REVENDA APOLLO:<span style="color: red;" title="Campo obrigatório">*</span></label>
                <div class="col-lg-5">
                  <input type="text" class="form-control" maxlength="2" require>
                </div>
                <div class="row mt-4">
                  <label for="inputNumber" class="col-sm-2 col-form-label">ORGANOGRAMA SENIOR:<small style="color: red;" title="Verificar informação com a Celina"><i class="bi bi-question-circle-fill"></i></small></label>
                  <div class="col-lg-5" style="margin-top: 12px;">
                    <input type="text" class="form-control" maxlength="2" require>
                  </div>
                </div>
                <div class="row mt-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">EMPRESA SENIOR:<small style="color: red;" title="Verificar informação com a Celina"><i class="bi bi-question-circle-fill"></i></small></label>
                  <div class="col-lg-5">
                    <input type="text" class="form-control" maxlength="2" require>
                  </div>
                </div>
                <div class="row mt-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">FILIAL SENIOR:<small style="color: red;" title="Verificar informação com a Celina"><i class="bi bi-question-circle-fill"></i></small></label>
                  <div class="col-lg-5">
                    <input type="text" class="form-control" maxlength="2" require>
                  </div>
                </div>
                <div class="row mt-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">CONSÓRCIO:<span style="color: red;" title="Campo obrigatório">*</span></label>
                  <div class="col-lg-5">
                  <select class="form-control" require>
                      <option>------------</option>
                      <option>SIM</option>
                      <option>NÃO</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">SITUAÇÃO:<span style="color: red;" title="Campo obrigatório">*</span></label>
                  <div class="col-lg-5">
                  <select class="form-control" require>
                      <option>------------</option>
                      <option>ATIVO</option>
                      <option>DESATIVADO</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <label for="marca" class="col-sm-2 col-form-label">UF:<span style="color: red;" title="Campo obrigatório">*</span></label>
                  <select class="form-control" style="width: 40%; margin-left: 10px;" placeholder="UF" name="estado" type="text" id="estado" required>
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
                </div>
                <div class="row mt-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">NÚMERO CAIXA:</label>
                  <div class="col-lg-5">
                    <input type="text" class="form-control" maxlength="2">
                </div>
                <div class="row mt-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">APROVADOR CAIXA:</label>
                  <div class="col-lg-5">
                  <select type="text" class="form-control">
                    <option>------------</option>
                    <?php 
                      require_once('../inc/apiRecebeSelbetti.php');
                      echo $aprovador;
                    ?>
                  </select>
                </div>


                  <div class="row mt-3">
                    <div class="col-lg-5">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                      <button class="btn btn-danger">Voltar</button>
                    </div>
                  </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      <div>



      </div>
    </div>
  </section>
  <!--################# section TERMINA AQUI #################-->

</main><!-- End #main -->

<?php
require_once('footer.php'); //Javascript e configurações afins
?>