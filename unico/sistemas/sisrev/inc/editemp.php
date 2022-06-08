
  <?php
  require_once("../config/queryBpmgp.php");
  require_once('../../../config/databases.php');  



  $info = $_GET['ID'];

  $editarTabela .= " WHERE ID_EMPRESA = $info";
  $resultado = $conn->query($editarTabela);

  while ($edit = $resultado->fetch_assoc()) {

    switch ($edit["SISTEMA"]) {
      case "A":
        $sistemaMysql = "APOLLO";
        break;
      case "N":
        $sistemaMysql = "BANCO NBS";
        break;
      case "H":
        $sistemaMysql = "BANCO HARLEY";
        break;
      case " ":
        $sistemaMysql = "EMPRESA QUE NÃO USA SISTEMA ERP";
        break;
      case "0":
        $sistemaMysql = "EMPRESA QUE NÃO USA SISTEMA ERP";
        break;
    }

    $consorcio = ($edit["CONSORCIO"] == 'S') ? 'SIM' : 'NÃO';

    $situacao = ($edit["SITUACAO"] == 'A') ? 'ATIVO' : 'DESATIVADO';

    $valueApollo = ($edit["EMPRESA_APOLLO"] == 0) ? '' : $edit["EMPRESA_APOLLO"];

    $valueRevApollo = ($edit["REVENDA_APOLLO"] == 0) ? '' : $edit["REVENDA_APOLLO"];

    $valueEmpNbs = ($edit["EMPRESA_NBS"] == 0) ? '' : $edit["EMPRESA_NBS"];

    echo '<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <form class="row g-3" action="" method="post" enctype="multipart/form-data">
              <!--DADOS PARA O LANÇAMENTO -->
              <div class="form-floating mt-4 col-md-12">
                <select class="form-select" id="floatingSelect" name="usuarioBPM" disabled>
                  <option value="1">' . $edit["NOME_EMPRESA"] . '</option>
                </select>
                <label for="floatingSelect" class="capitalize">EMPRESA:</label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <select class="form-select" onchange="camposObrigatorios()" id="sistema" name="sistema"  required>
                <option value="' . $edit["SISTEMA"] . '" selected>' . $sistemaMysql . '</option>
                  <option value="">-----------------</option>
                  <option value="A">APOLLO</option>
                  <option value="N">BANCO NBS</option>
                  <option value="H">BANCO HARLEY</option>  
                  <option value="0">EMPRESA QUE NÃO USA SISTEMA ERP</option>     
                </select>
                <label for="sistema">SISTEMA:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6" id="empresa_apollo">
                <input onkeypress="onlynumber()" value="' . $valueApollo . '" class="form-control"  name="empresa_apollo" maxlength="2" required>
                <label for="empresa_apollo">EMPRESA APOLLO:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6" id="revendaApollo">
              <input onkeypress="onlynumber()" value="' . $valueRevApollo . '" class="form-control"  name="revendaApollo" maxlength="2" required>
                <label for="revendaApollo">REVENDA APOLLO:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6" id="orgsenior">
              <input value="' . $edit["ORGANOGRAMA_SENIOR"] . '" class="form-control"  name="orgsenior" maxlength="2" required>
                <label for="orgsenior">ORGANOGRAMA SENIOR:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6" >
              <input onkeypress="onlynumber()" value="' . $edit["EMPRESA_NBS"] . '"  class="form-control" id="empresaNbs" name="empresaNbs" maxlength="2" required>
                <label for="empresaNbs">Empresa NBS:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <input onkeypress="onlynumber()" value="' . $edit["EMPRESA_SENIOR"] . '" class="form-control" id="empresasenior" name="empresasenior" maxlength="2" required>
                <label for="empresasenior">EMPRESA SENIOR:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
              <input onkeypress="onlynumber()" value="' . $edit["FILIAL_SENIOR"] . '" class="form-control" id="filialsenior" name="filialsenior" maxlength="2" required>
                <label for="filialsenior">FILIAL SENIOR:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <select class="form-select" id="consorcio" name="consorcio" required>
                  <option value="' . $consorcio . '">' . $consorcio . '</option>
                  <option value="">-----------------</option>
                  <option value="2">SIM</option>
                  <option value="3">NÃO</option>
                </select>
                <label for="consorcio">CONSÓRCIO:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <select class="form-select" id="floatingSelect" name="situacao" required>
                  <option value="' . $edit["SITUACAO"] . '">' . $situacao . '</option>
                  <option value="">-----------------</option>
                  <option value="A">ATIVO</option>
                  <option value="D">DESATIVADO</option>
                </select>
                <label for="situacao">SITUAÇÃO:<span style="color: red;">*</span></label>
              </div>

              <div class="form-floating mt-4 col-md-6">
                <select class="form-select" id="estado" name="estado" required>
                <option value="' . $edit['UF_GESTAO'] . '">' . $edit['UF_GESTAO'] . '</option>
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
                <label for="estado">UF:<span style="color: red;">*</span></label>
              </div>
              <div class="form-floating mt-4 col-md-6">
              <input onkeypress="onlynumber()" value="' . $edit['NUMERO_CAIXA'] . '" class="form-control" id="numero_caixa" name="numero_caixa" maxlength="2" onblur="aprovador()" onkeypress="onlynumber()" required>
              <label for="numero_caixa">NUMERO CAIXA:<span style="color: red;">*</span></label>
              </div>
              <div class="form-floating mt-4 col-md-6" style="display: ';
              echo empty($edit['NUMERO_CAIXA']) ? 'none' : 'block'; echo ';" id="liberarApro">
              <select  class="form-select" id="floatingSelect" name="aproCaixa" id="aproCaixa"required>';
              if(empty($edit['APROVADOR_CAIXA'])){
                echo '<option>------------------</option>';
              }else{
                echo '<option value="' . $edit['APROVADOR_CAIXA'] . '" selected>' . $edit['APROVADOR_CAIXA'] . '</option>
                <option value="">-----------------</option>';
              }
    require_once('../inc/apiRecebeSelbetti.php');
    echo $aprovador;
    echo '</select>
   
    <label for="aproCaixa">APROVADOR CAIXA:<span style="color: red;">*</span></label>
    </div>
    <div class="text-center py-2">
    <button type="reset" class="btn btn-secondary">Limpar Formulario</button>
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>
  <script>
                function aprovador(){
                    var tela = document.getElementById("liberarApro").style.display;

                    if (tela == "none") {
                        document.getElementById("liberarApro").style.display = "block";
                        document.getElementById("aproCaixa").required = true;
                    } else {
                        document.getElementById("liberarApro").style.display = "none";
                        document.getElementById("aproCaixa").required = false;
                    }
                }
            </script>

  <script>
                function camposObrigatorios() {
                    var value = document.getElementById("sistema").value

                    if(value == "A") {                    
                        document.getElementById("empresaNbs").style.display = "none";
                        document.getElementById("empnbs").value = "";                     
                        document.getElementById("empresaApollo").style.display = "block";
                        document.getElementById("revendaApollo").style.display = "block";  
                        
                    }else{
                        document.getElementById("empresaNbs").style.display = "block";
                        document.getElementById("empresaApollo").style.display = "none";
                        document.getElementById("revendaApollo").style.display = "none";
                        document.getElementById("empApollo").value = ""; 
                        document.getElementById("revApollo").value = "";              
                    }
                }                
            </script>
  </form><!-- FIM Form -->
  </div><!-- FIM card-body -->
  </div><!-- FIM card -->
  </div><!-- FIM col-lg-12 -->
  </section>
  </main>


<!--################# COLE section AQUI #################-->
<!-- End #main -->

';
}
?>
<?php
require_once('footer.php'); //Javascript e configurações afins
?>