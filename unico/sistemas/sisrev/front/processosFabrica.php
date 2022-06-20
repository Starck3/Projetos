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
            <?php 
            $data = $_POST['dataPesquisa'];    // recebe data
            $selecionada = implode('/', array_reverse(explode('-', $_POST['dataPesquisa']))); //transformar data em pt-BR
            $data = implode('', array_reverse(explode('-', $data))); //transformar a data para a verificação da pasta
            

            $Dir = "../documentos/CAR/".$data."";

            $fileName = rtrim($data,'2022');

            //salva caminho do arquivo para verificação
            $las = "$Dir/las$fileName.txt";
            $lyf = "$Dir/lyf$fileName.txt";
            $luc = "$Dir/luc$fileName.txt";
            $lmc = "$Dir/lmc$fileName.txt";
            $lgf = "$Dir/lgf$fileName.txt";
            $lb3 = "$Dir/lb3$fileName.txt"; 
            $l50 = "$Dir/l50$fileName.txt";
            $l0s = "$Dir/l0s$fileName.txt";
            $pmu = "$Dir/pmu$fileName.txt";
            $sjp = "$Dir/sjp$fileName.txt";
            
            ?>
            <form  method="POST" action="<?= $PHP_SELF ?>">
              <div style="margin-left: 76px;">
                <label for="inputDate" class="col-sm-2 col-form-label" style="margin-left: 0px;">Selecione a data:</label>
                <input type="date" style="width:28%;display:inline;" class="form-control col-lg-12" id="dataPesquisa" name="dataPesquisa" >&emsp;
                <button class="btn btn-primary btn-sm" type="submit">CAR</button> <span style="color: red;margin-left: 76px;"><?= !empty($data)? $dataSelecionada = "*Data selecionada " . $selecionada . " *" : $dataSelecionada = ""?></span>
              </div>
            </form>
            <br>
            
            <!-- Vertical Form -->
            <form>
              <div class="container col-lg-6" style="margin-left: 0px;">
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <label class="form-check-label" for="flexSwitchCheckDefault1">MV</label>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar" 
                      <?= (file_exists($lb3))? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <label class="form-check-label" for="flexSwitchCheckDefault2">Filial</label>
                    <input type="text" class="form-control" disabled value="10" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <label class="form-check-label"  for="flexSwitchCheckDefault3">Nome do arquivo:</label>
                    <input type="text" class="form-control"  placeholder="lb3" style="padding: 0rem 0rem;" value="<?= (file_exists($lb3))? $status = "lb3".$fileName.".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault4" name="carimbar" 
                      <?= (file_exists($lmc))? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="12" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="lmc" style="padding: 0rem 0rem;" value="<?= (file_exists($lmc))? $status = "lmc".$fileName.".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault5" name="carimbar" 
                      <?= (file_exists($las))? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="14" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  placeholder="las" style="padding: 0rem 0rem;"value="<?= (file_exists($las))? $status = "las".$fileName.".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault6" name="carimbar" 
                      <?= (file_exists($pmu))? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="16" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value=""  placeholder="pmu" style="padding: 0rem 0rem;"value="<?= (file_exists($pmu))? $status = "pmu".$fileName.".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault7" name="carimbar" 
                      <?= (file_exists($lgf))? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="19" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  placeholder="lgf" style="padding: 0rem 0rem;"value="<?= (file_exists($lgf))? $status = "lgf".$fileName.".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault8" name="carimbar" 
                      <?= (file_exists($l0s))? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="20" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  placeholder="l0s" style="padding: 0rem 0rem;"value="<?= (file_exists($l0s))? $status = "l0s".$fileName.".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault9" name="carimbar" 
                      <?= (file_exists($lyf))? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="85" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  placeholder="lyf" style="padding: 0rem 0rem;"value="<?= (file_exists($lyf))? $status = "lyf".$fileName.".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault10" name="carimbar" 
                      <?= (file_exists($sjp))? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="86" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  placeholder="sjp" style="padding: 0rem 0rem;"value="<?= (file_exists($sjp))? $status = "sjp".$fileName.".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" name="carimbar" 
                      <?= (file_exists($l50))? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="89" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  placeholder="l50" style="padding: 0rem 0rem;"value="<?= (file_exists($l50))? $status = "l50".$fileName.".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault12" name="carimbar" 
                      <?= (file_exists($luc))? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="101" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  placeholder="luc" style="padding: 0rem 0rem;"value="<?= (file_exists($luc))? $status = "luc".$fileName.".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="text-center py-5">
                  <a href="http://<?= $_SERVER['SERVER_ADDR'] ?>/unico/sistemas/sisrev/front/processos.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>"><button type="button" class="btn btn-primary">Voltar</button></a>
                  <button type="reset" class="btn btn-secondary">Limpar Formulario</button>
                  <button type="submit" class="btn btn-success">Carga</button>
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
<script>
  var input = document.querySelector("#dataPesquisa");
  var texto = input.value;
  console.log(texto);
</script>
<?php
require_once('footer.php'); //Javascript e configurações afins
?>