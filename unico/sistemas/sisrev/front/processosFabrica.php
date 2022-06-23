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
            <br>
            <h5 class="card-title" style="text-align: left;">LISTA ARQUIVOS FABRICA</h5>
            <?php
            $msn = $_GET['msn'];
            $data1 = $_POST['dataPesquisa']; // recebe data
            $data2 = $_GET['dataArquivo'];
            
            if($data1){
              $selecionada = implode('/', array_reverse(explode('-', $data1)));//transformar data em pt-BR
              $data = implode('', array_reverse(explode('-', $data1))); //transformar a data para a verificação da pasta
            }else{
              $selecionada = implode('/', array_reverse(explode('-', $data2))); //transformar data em pt-BR
              $data = implode('', array_reverse(explode('-', $data2))); //transformar a data para a verificação da pasta
            }
          
            $Dir = "../documentos/CAR/" . $data . "";

            $fileName = substr($data, 0,4);

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
            <div class="col-lg-12" style="display: none" id="carregamento">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Aguarde, estamos lendo o arquivo</h5>

                  <!-- Progress Bars with Striped Backgrounds-->
                  <div class="progress mt-3">
                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated process-pe" id="barracarregamento" role="progressbar" style="width: 5%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

            </div>
            <div class="card">
                <!-- Default Tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link <?= empty($msn)? 'active' : '' ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="<?= empty($data)? 'true' : 'false' ?>">Selecionar Data</button>
                  </li>
                  <li class="nav-item " role="presentation">
                    <button class="nav-link <?= empty($msn)? '' : 'active' ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="<?= empty($data)? 'false' : 'true' ?>">Carregar arquivo</button>
                  </li>
                </ul>
                <div class="tab-content pt-2" id="myTabContent">
                  <div class="tab-pane fade <?= empty($msn)? 'active show' : '' ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="header d-flex align-items-center header-scrolled">
                      <form method="POST" action="<?= $PHP_SELF ?>" class="search-form d-flex align-items-center">
                        <input type="date" style="width:40%;" class="form-control col-lg-12" id="dataPesquisa" name="dataPesquisa">
                        <button class="btn btn-sucess btn-sm" type="submit"><i class="bi bi-search"></i></button>
                      </form>
                    </div>
                  </div>
                  <div class="tab-pane fade <?= empty($msn)? '' : 'active show' ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="header d-flex align-items-center header-scrolled">
                      <form class="search-form d-flex align-items-center" method="POST" action='../inc/processosUpload.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>' enctype="multipart/form-data">
                        <input type="file" name="arquivo[]" placeholder="Insira Documento" id="arquivo" style="width: 400px;" multiple="multiple">
                        <button type="submit" title="Enviar" class="btn btn-success" onclick="teste()"><i class="bi bi-send"></i></button>
                      </form>
                      <code style="float:right;margin-right:30px;">Carregar arquivo obrigatório: .txt</code>
                    </div>
                  </div>
                </div><!-- End Default Tabs -->
              </div>
              <hr style="opacity: 0;">
              <span style="color: red;"><?= !empty($data) ? $dataSelecionada = "*Data selecionada " . $selecionada . " *" : $dataSelecionada = "" ?></span>
            <form>
              <div class="container col-lg-6" style="margin-left: 170px;display:<?= !empty($selecionada)?'block' : 'none' ?>">
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <label class="form-check-label" for="flexSwitchCheckDefault1">MV</label>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="carimbar" <?= (file_exists($lb3)) ? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <label class="form-check-label" for="flexSwitchCheckDefault2">Filial</label>
                    <input type="text" class="form-control" disabled value="10" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <label class="form-check-label" for="flexSwitchCheckDefault3">Nome do arquivo:</label>
                    <input type="text" class="form-control" placeholder="lb3" style="padding: 0rem 0rem;" value="<?= (file_exists($lb3)) ? $status = "lb3" . $fileName . ".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault4" name="carimbar" <?= (file_exists($lmc)) ? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="12" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="lmc" style="padding: 0rem 0rem;" value="<?= (file_exists($lmc)) ? $status = "lmc" . $fileName . ".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault5" name="carimbar" <?= (file_exists($las)) ? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="14" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="las" style="padding: 0rem 0rem;" value="<?= (file_exists($las)) ? $status = "las" . $fileName . ".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault6" name="carimbar" <?= (file_exists($pmu)) ? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="16" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="" placeholder="pmu" style="padding: 0rem 0rem;" value="<?= (file_exists($pmu)) ? $status = "pmu" . $fileName . ".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault7" name="carimbar" <?= (file_exists($lgf)) ? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="19" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="lgf" style="padding: 0rem 0rem;" value="<?= (file_exists($lgf)) ? $status = "lgf" . $fileName . ".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault8" name="carimbar" <?= (file_exists($l0s)) ? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="20" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="l0s" style="padding: 0rem 0rem;" value="<?= (file_exists($l0s)) ? $status = "l0s" . $fileName . ".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault9" name="carimbar" <?= (file_exists($lyf)) ? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="85" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="lyf" style="padding: 0rem 0rem;" value="<?= (file_exists($lyf)) ? $status = "lyf" . $fileName . ".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault10" name="carimbar" <?= (file_exists($sjp)) ? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="86" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="sjp" style="padding: 0rem 0rem;" value="<?= (file_exists($sjp)) ? $status = "sjp" . $fileName . ".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" name="carimbar" <?= (file_exists($l50)) ? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="89" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="l50" style="padding: 0rem 0rem;" value="<?= (file_exists($l50)) ? $status = "l50" . $fileName . ".txt" : $status = ''; ?>">
                  </div>
                </div>
                <div class="row" style="margin-left:43px;">
                  <div class="col-sm-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault12" name="carimbar" <?= (file_exists($luc)) ? $status = 'checked' : $status = ''; ?>>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" disabled value="101" style="padding: 0rem 0rem;">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="luc" style="padding: 0rem 0rem;" value="<?= (file_exists($luc)) ? $status = "luc" . $fileName . ".txt" : $status = ''; ?>">
                  </div>
                </div>
                
              </div>
            </form>
            <div class="py-5" style="float: left;">
                  <a href="http://<?= $_SERVER['SERVER_ADDR'] ?>/unico/sistemas/sisrev/front/processos.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>"><button type="button" class="btn btn-primary">Voltar</button></a>
                </div>
            <!-- Vertical Form -->
          </div>
        </div>
      </div>


    </div>

  </section>
  <!--################# section TERMINA AQUI #################-->

</main><!-- End #main -->
<script>
  function teste() {
    var value = document.getElementById("arquivo").value;

    if ((value != '')) {
      document.getElementById("carregamento").style.display = "block";
    }

  }
</script>
<?php
require_once('footer.php'); //Javascript e configurações afins
?>